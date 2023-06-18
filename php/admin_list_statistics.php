<?php
include '../database/config.php';

$sql = "SELECT statistics.*, room.room_name, room.roomID, device.device_name, user.name, user.surname
        FROM statistics
        JOIN device ON statistics.deviceID = device.deviceID
        JOIN room ON device.roomID = room.roomID
        JOIN user ON user.userID = room.userID";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $deviceIDs = [];
    $operationCounts = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $deviceID = $row["deviceID"];
        $operation = $row["operation"];

        if (array_key_exists($deviceID, $operationCounts)) {
            $operationCounts[$deviceID]++;
        } else {
            $deviceIDs[] = $deviceID;
            $operationCounts[$deviceID] = 1;
        }
    }

    $labels = [];
    $data = [];

    foreach ($deviceIDs as $deviceID) {
        $labels[] = $deviceID;
        $data[] = $operationCounts[$deviceID];
    }

    
    $deviceNames = [];
    $sql2 = "SELECT deviceID, device_name FROM device";
    $result2 = mysqli_query($conn, $sql2);

    while ($row2 = mysqli_fetch_assoc($result2)) {
        $deviceID = $row2["deviceID"];
        $deviceName = $row2["device_name"];
        $deviceNames[$deviceID] = $deviceName;
    }

    // Close the database connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Statistics Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="statisticsChart"></canvas>

    <script>
        
        var labels = <?php echo json_encode($labels); ?>;
        var data = <?php echo json_encode($data); ?>;
        var deviceNames = <?php echo json_encode($deviceNames); ?>;

        // Create the chart
        var ctx = document.getElementById('statisticsChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Operation Count',
                    data: data,
                    backgroundColor: 'rgba(0, 123, 255, 0.5)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1,
                        precision: 0 // Display whole numbers only
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            title: function(tooltipItem) {
                                var index = tooltipItem[0].dataIndex;
                                return labels[index];
                            },
                            label: function(context) {
                                var index = context.dataIndex;
                                var deviceID = labels[index];
                                var deviceName = deviceNames[deviceID];
                                return 'Device: ' + deviceName;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>

<?php
} else {
    echo "No statistics found";
}
?>
