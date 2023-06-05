<?php
require_once "../database/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deviceID = $_POST['deviceID'];
    $temperature = $_POST['temperatureAir'];
    $sql12 = "SELECT isOpen, mode FROM air_conditioner WHERE deviceID='$deviceID'";
    mysqli_query($conn, $sql12);
    $result12 = mysqli_query($conn, $sql12);
    if (mysqli_num_rows($result12) > 0){
        $row12 = mysqli_fetch_assoc($result12);
    }
    if($row12['isOpen'] == 1){
        $sql23  = "UPDATE device JOIN room ON device.roomID = room.roomID SET room.temperature = '$temperature' WHERE device.deviceID = '$deviceID'";
        mysqli_query($conn, $sql23);
    }
    $sql = "UPDATE air_conditioner SET temperature = $temperature WHERE deviceID = $deviceID";

    if (mysqli_query($conn, $sql) ) {
        header("Location: " . $_SERVER["HTTP_REFERER"]); 
        exit();
    } else {
        echo "Güncelleme hatası: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
