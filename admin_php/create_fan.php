<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomID = $_POST['roomID'];
    $deviceName = $_POST['device_name'];

    // Insert device into device table
    $deviceSql = "INSERT INTO device (roomID, device_name, device_type) VALUES ($roomID, '$deviceName', 'fan')";

    if ($conn->query($deviceSql) === TRUE) {
        // Retrieve the auto-generated deviceID
        $deviceID = $conn->insert_id;

        // Insert corresponding entry into light table
        $sql = "INSERT INTO fan (deviceID, speed , isOpen) VALUES ($deviceID, 15 , 0)";

        if ($conn->query($sql) === TRUE) {
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
