<?php
include '../php/session_user.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        * {
            font-family: "Montserrat", sans-serif;
        }
    </style>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/adminstyle.css">
    <script src="../js/deleteuser.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <title>Statistics</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <?php  include "consumer_sidebar.php";?>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0 text-dark">Statistics</h2>
                </div>
                
                <?php include 'navbar.php';?>

            <div class="container-fluid px-4">
                

                <div class="row my-5">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="fs-4 mb-3">Recent Activities</h3>
                        </div>
                    </div>
                    <div class="m-3 bg-light ms-5 w-75 h-50 rounded" >
                        <canvas id="barChart" width="400" height="100"></canvas>
                    </div>
                    <div class="col">
                        <table id="example" class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="60">#</th>
                                    <th scope="col" width="130">Device ID</th>
                                    <th scope="col" width="280">Device Name</th>
                                    <th scope="col" width="400">Activity</th>
                                    <th scope="col">Date</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php include '../php/user_list_activity.php';  ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
    <script>
        $(document).ready(function () {
    $('#example').DataTable();
});
    </script>
    <script>
        <?php
        include '../database/config.php';
        $sql = "SELECT DATE_FORMAT(date, '%Y/%m') as month, COUNT(*) as count 
        FROM statistics AS s
        INNER JOIN device AS d ON d.deviceID = s.deviceID
        INNER JOIN room AS r ON r.roomID = d.roomID
        INNER JOIN user AS u ON u.userID = r.userID
        WHERE u.userID = '$userID'
        GROUP BY month";
        $result = $conn->query($sql);

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[$row['month']] = $row['count'];
        }

        $conn->close();
        ?>

        var labels = [];
        var values = [];
        <?php foreach ($data as $month => $count) { ?>
            labels.push("<?php echo $month; ?>");
            values.push("<?php echo $count; ?>");
        <?php } ?>

        var ctx = document.getElementById("barChart").getContext("2d");
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'User Activity Count',
                    data: values,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0,
                        stepSize: 1
                    }
                }
            }
        });


    </script>    
</body>

</html>