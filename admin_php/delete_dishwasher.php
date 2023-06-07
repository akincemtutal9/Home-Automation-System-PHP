<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dishwasherID = $_POST['dishID'];

    // Delete from statistics table
    $statisticsSql = "DELETE FROM statistics WHERE deviceID = $dishwasherID";

    if ($conn->query($statisticsSql) === TRUE) {
        // Delete from dishwasher table
        $dishSql = "DELETE FROM dishwasher WHERE deviceID = $dishwasherID";

        if ($conn->query($dishSql) === TRUE) {
            // Delete from device table
            $deviceSql = "DELETE FROM device WHERE deviceID = $dishwasherID";

            if ($conn->query($deviceSql) === TRUE) {
                header("Location: " . $_SERVER["HTTP_REFERER"]); 
                exit();
            } else {
                echo "Error deleting from device table: " . $conn->error;
            }
        } else {
            echo "Error deleting from dishwasher table: " . $conn->error;
        }
    } else {
        echo "Error deleting from statistics table: " . $conn->error;
    }

    $conn->close();    
}
?>
