<?php   
include '../database/config.php';
$room_ID = $_SESSION['room_ID'];
if (isset($_POST['air-conditioner-mode-4'])) {
    $mode = $_POST['air-conditioner-mode-4'];
    $sqldb="UPDATE air_conditioner SET mode = '$mode' WHERE deviceID = '{$rowac['deviceID']}'";
    mysqli_query($conn, $sqldb);
}

?>