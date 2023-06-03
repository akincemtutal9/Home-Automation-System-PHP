<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomID = $_POST['roomID'];
    $deviceName = $_POST['device_name'];

    // Insert device into device table
    $deviceSql = "INSERT INTO device (roomID, device_name, device_type) VALUES ($roomID, '$deviceName', 'dishwasher')";

    if ($conn->query($deviceSql) === TRUE) {
        // Retrieve the auto-generated deviceID
        $deviceID = $conn->insert_id;

        // Insert corresponding entry into light table
        $lightSql = "INSERT INTO dishwasher (deviceID, isOpen) VALUES ($deviceID, 0)";

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
