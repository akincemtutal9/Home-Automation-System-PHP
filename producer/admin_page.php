<?php
include '../php/session_admin.php';
include '../database/config.php';


$totalRoomsCount = 0;
$usedDevicesCount = 0;
$totalUsersCount = 0;

$airCount = 0;
$dishwasherCount = 0;
$electricBlanketCount = 0;
$fanCount = 0;
$lightCount = 0;
$robotToyCount = 0;
$robotVacuumCount = 0;
$washingMachineCount = 0;

$statisticsCount = 0;
$messagesCount = 0;


// Count of Used Devices
$usedDevicesSql = 'SELECT COUNT(*) as count FROM device';
$usedDevicesResult = $conn->query($usedDevicesSql);
if ($usedDevicesResult && $usedDevicesResult->num_rows > 0) {
    $usedDevicesRow = $usedDevicesResult->fetch_assoc();
    $usedDevicesCount = $usedDevicesRow['count'];
}

// Total Users Count
$totalUsersSql = "SELECT COUNT(*) as count FROM user WHERE user_type = 'user' ";
$totalUsersResult = $conn->query($totalUsersSql);
if ($totalUsersResult && $totalUsersResult->num_rows > 0) {
    $totalUsersRow = $totalUsersResult->fetch_assoc();
    $totalUsersCount = $totalUsersRow['count'];
}

// Total Rooms Count
$totalRoomsSql = 'SELECT COUNT(*) as count FROM room';
$totalRoomsResult = $conn->query($totalRoomsSql);
if ($totalRoomsResult && $totalRoomsResult->num_rows > 0) {
    $totalRoomsRow = $totalRoomsResult->fetch_assoc();
    $totalRoomsCount = $totalRoomsRow['count'];
}


// Air Conditioner Count
$airSql = 'SELECT COUNT(*) as count FROM air_conditioner';
$airResult = $conn->query($airSql);
if ($airResult && $airResult->num_rows > 0) {
    $airRow = $airResult->fetch_assoc();
    $airCount = $airRow['count'];
}

// Dishwasher Count
$dishwasherSql = 'SELECT COUNT(*) as count FROM dishwasher';
$dishwasherResult = $conn->query($dishwasherSql);
if ($dishwasherResult && $dishwasherResult->num_rows > 0) {
    $dishwasherRow = $dishwasherResult->fetch_assoc();
    $dishwasherCount = $dishwasherRow['count'];
}

// Electric Blanket Count
$electricBlanketSql = 'SELECT COUNT(*) as count FROM electric_blanket';
$electricBlanketResult = $conn->query($electricBlanketSql);
if ($electricBlanketResult && $electricBlanketResult->num_rows > 0) {
    $electricBlanketRow = $electricBlanketResult->fetch_assoc();
    $electricBlanketCount = $electricBlanketRow['count'];
}

// Fan Count
$fanSql = 'SELECT COUNT(*) as count FROM fan';
$fanResult = $conn->query($fanSql);
if ($fanResult && $fanResult->num_rows > 0) {
    $fanRow = $fanResult->fetch_assoc();
    $fanCount = $fanRow['count'];
}

// Light Count
$lightSql = 'SELECT COUNT(*) as count FROM light';
$lightResult = $conn->query($lightSql);
if ($lightResult && $lightResult->num_rows > 0) {
    $lightRow = $lightResult->fetch_assoc();
    $lightCount = $lightRow['count'];
}

// Robot Toy Count
$robotToySql = 'SELECT COUNT(*) as count FROM robot_toy';
$robotToyResult = $conn->query($robotToySql);
if ($robotToyResult && $robotToyResult->num_rows > 0) {
    $robotToyRow = $robotToyResult->fetch_assoc();
    $robotToyCount = $robotToyRow['count'];
}

// Robot Vacuum Cleaner Count
$robotVacuumSql = 'SELECT COUNT(*) as count FROM robot_vacum_cleaner';
$robotVacuumResult = $conn->query($robotVacuumSql);
if ($robotVacuumResult && $robotVacuumResult->num_rows > 0) {
    $robotVacuumRow = $robotVacuumResult->fetch_assoc();
    $robotVacuumCount = $robotVacuumRow['count'];
}

// Washing Machine Count
$washingMachineSql = 'SELECT COUNT(*) as count FROM washing_machine';
$washingMachineResult = $conn->query($washingMachineSql);
if ($washingMachineResult && $washingMachineResult->num_rows > 0) {
    $washingMachineRow = $washingMachineResult->fetch_assoc();
    $washingMachineCount = $washingMachineRow['count'];
}

$messagesSql = 'SELECT COUNT(*) as count FROM message';
$messagesResult = $conn->query($messagesSql);
if ($messagesResult && $messagesResult->num_rows > 0) {
    $messagesRow = $messagesResult->fetch_assoc();
    $messagesCount = $messagesRow['count'];
}

// Count of Statistics

$statisticsSql = 'SELECT COUNT(*) as count FROM statistics';
$statisticsResult = $conn->query($statisticsSql);
if ($statisticsResult && $statisticsResult->num_rows > 0) {
    $statisticsRow = $statisticsResult->fetch_assoc();
    $statisticsCount = $statisticsRow['count'];
}
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
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">

        <?php include '../producer/admin_sidebar.php' ?>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php include '../producer/admin_dropdown.php' ?>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $totalUsersCount?></h3>
                                <p class="fs-5">Total Users</p>
                            </div>
                            <i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $usedDevicesCount?></h3>
                                <p class="fs-5">Total Devices </p>
                            </div>
                            <i class="fas fa-laptop fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $totalRoomsCount?></h3>
                                <p class="fs-5">Total Rooms</p>
                            </div>
                            <i class="fas fa-home fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">%25</h3>
                                <p class="fs-5">Web Usage</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>


                <!-- ... -->
                <div class="container-fluid px-4">
                    <!-- ... -->

                    <div class="row g-3 my-2">
                        <!-- ... -->
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-3 bg-white shadow-sm rounded">
                                <canvas id="myChart1"></canvas>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 bg-white shadow-sm rounded">
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx1 = document.getElementById('myChart1').getContext('2d');
        var myChart1 = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Air Conditioner', 'Dishwasher', 'Electric Blanket', 'Fan', 'Light', 'Robot Toy', 'Robot Vacuum Cleaner', 'Washing Machine'],
                datasets: [{
                    label: 'Device Count',
                    data: [
                        <?php echo $airCount; ?>,
                        <?php echo $dishwasherCount; ?>,
                        <?php echo $electricBlanketCount; ?>,
                        <?php echo $fanCount; ?>,
                        <?php echo $lightCount; ?>,
                        <?php echo $robotToyCount; ?>,
                        <?php echo $robotVacuumCount; ?>,
                        <?php echo $washingMachineCount; ?>
                    ],
                    backgroundColor: 'rgba(0, 123, 255, 0.5)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(0, 123, 255, 1)',
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx2 = document.getElementById('myChart2').getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Messages', 'Statistics'],
                datasets: [{
                    label: 'Messages & Statistics',
                    data: [
                        <?php echo $messagesCount; ?>,
                        <?php echo $statisticsCount; ?>
                    ],
                    backgroundColor: 'rgba(0, 123, 255, 0.5)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 2,
                    hoverBackgroundColor: 'rgba(0, 123, 255, 0.8)',
                    hoverBorderColor: 'rgba(0, 123, 255, 1)',
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
</body>

</html>