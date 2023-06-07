<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vacuumID = $_POST['vacuumID'];

    // Delete from statistics table
    $statisticsSql = "DELETE FROM statistics WHERE deviceID = $vacuumID";

    if ($conn->query($statisticsSql) === TRUE) {
        // Delete from robot_vacum_cleaner table
        $vacuumSql = "DELETE FROM robot_vacum_cleaner WHERE deviceID = $vacuumID";

        if ($conn->query($vacuumSql) === TRUE) {
            // Delete from device table
            $deviceSql = "DELETE FROM device WHERE deviceID = $vacuumID";

            if ($conn->query($deviceSql) === TRUE) {
                header("Location: " . $_SERVER["HTTP_REFERER"]); 
                exit();
            } else {
                echo "Error deleting from device table: " . $conn->error;
            }
        } else {
            echo "Error deleting from robot_vacum_cleaner table: " . $conn->error;
        }
    } else {
        echo "Error deleting from statistics table: " . $conn->error;
    }

    $conn->close();    
}
?>
