<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomID = $_POST['roomID'];
    $deviceName = mysqli_real_escape_string($conn , $_POST['device_name']);

    $deviceSql = "INSERT INTO device (roomID, device_name, device_type) VALUES ($roomID, '$deviceName', 'light')";

    if ($conn->query($deviceSql) === TRUE) {

        $deviceID = $conn->insert_id;

        $lightSql = "INSERT INTO light (deviceID, color, isOpen) VALUES ($deviceID,'#000000', 0)";

        if ($conn->query($lightSql) === TRUE) {
            header("Location: " . $_SERVER["HTTP_REFERER"]); 
            exit();
        } else {
            echo "Error inserting into light table: " . $conn->error;
        }
    } else {
        echo "Error inserting into device table: " . $conn->error;
    }

    $conn->close();    
}
?>
