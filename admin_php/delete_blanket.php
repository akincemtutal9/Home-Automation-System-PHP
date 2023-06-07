<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blanketID = $_POST['blanketID'];

    // Delete from statistics table
    $statisticsSql = "DELETE FROM statistics WHERE deviceID = $blanketID";

    if ($conn->query($statisticsSql) === TRUE) {
        // Delete from electric_blanket table
        $blanketSql = "DELETE FROM electric_blanket WHERE deviceID = $blanketID";

        if ($conn->query($blanketSql) === TRUE) {
            // Delete from device table
            $deviceSql = "DELETE FROM device WHERE deviceID = $blanketID";

            if ($conn->query($deviceSql) === TRUE) {
                header("Location: " . $_SERVER["HTTP_REFERER"]); 
                exit();
            } else {
                echo "Error deleting from device table: " . $conn->error;
            }
        } else {
            echo "Error deleting from electric_blanket table: " . $conn->error;
        }
    } else {
        echo "Error deleting from statistics table: " . $conn->error;
    }

    $conn->close();    
}
?>
