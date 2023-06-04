<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $machineID = $_POST['washingmachineID'];

    // Insert device into device table
    $WMSql = "DELETE FROM washing_machine WHERE deviceID = $machineID";

    if ($conn->query($WMSql) === TRUE) {
        // Insert corresponding entry into light table
        $deviceSql = "DELETE FROM device WHERE deviceID = $machineID";

        if ($conn->query($deviceSql) === TRUE) {
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
