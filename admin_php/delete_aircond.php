<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $airID = $_POST['airID'];

    // Delete from statistics table
    $statisticsSql = "DELETE FROM statistics WHERE deviceID = $airID";

    if ($conn->query($statisticsSql) === TRUE) {
        // Delete from air_conditioner table
        $airSql = "DELETE FROM air_conditioner WHERE deviceID = $airID";

        if ($conn->query($airSql) === TRUE) {
            // Delete from device table
            $deviceSql = "DELETE FROM device WHERE deviceID = $airID";

            if ($conn->query($deviceSql) === TRUE) {
                header("Location: " . $_SERVER["HTTP_REFERER"]); 
                exit();
            } else {
                echo "Error deleting from device table: " . $conn->error;
            }
        } else {
            echo "Error deleting from air_conditioner table: " . $conn->error;
        }
    } else {
        echo "Error deleting from statistics table: " . $conn->error;
    }

    $conn->close();    
}
?>
