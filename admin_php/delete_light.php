<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lightID = $_POST['lightID'];

    // Delete from statistics table
    $statisticsSql = "DELETE FROM statistics WHERE deviceID = $lightID";

    if ($conn->query($statisticsSql) === TRUE) {
        // Delete from light table
        $lightSql = "DELETE FROM light WHERE deviceID = $lightID";

        if ($conn->query($lightSql) === TRUE) {
            // Delete from device table
            $deviceSql = "DELETE FROM device WHERE deviceID = $lightID";

            if ($conn->query($deviceSql) === TRUE) {
                header("Location: " . $_SERVER["HTTP_REFERER"]); 
                exit();
            } else {
                echo "Error deleting from device table: " . $conn->error;
            }
        } else {
            echo "Error deleting from light table: " . $conn->error;
        }
    } else {
        echo "Error deleting from statistics table: " . $conn->error;
    }

    $conn->close();    
}
?>
