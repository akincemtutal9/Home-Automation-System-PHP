<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lightID = $_POST['lightID'];

    // Insert device into device table
    $lightSql = "DELETE FROM light WHERE deviceID = $lightID";

    if ($conn->query($lightSql) === TRUE) {
        // Insert corresponding entry into light table
        $deviceSql = "DELETE FROM device WHERE deviceID = $lightID";

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
