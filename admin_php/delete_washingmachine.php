<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $machineID = $_POST['washingmachineID'];

    // Delete from statistics table
    $statisticsSql = "DELETE FROM statistics WHERE deviceID = $machineID";

    if ($conn->query($statisticsSql) === TRUE) {
        // Delete from washing_machine table
        $WMSql = "DELETE FROM washing_machine WHERE deviceID = $machineID";

        if ($conn->query($WMSql) === TRUE) {
            // Delete from device table
            $deviceSql = "DELETE FROM device WHERE deviceID = $machineID";

            if ($conn->query($deviceSql) === TRUE) {
                header("Location: " . $_SERVER["HTTP_REFERER"]); 
                exit();
            } else {
                echo "Error deleting from device table: " . $conn->error;
            }
        } else {
            echo "Error deleting from washing_machine table: " . $conn->error;
        }
    } else {
        echo "Error deleting from statistics table: " . $conn->error;
    }

    $conn->close();    
}
?>
