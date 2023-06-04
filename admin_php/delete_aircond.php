<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $airID = $_POST['airID'];

    // Insert device into device table
    $airSql = "DELETE FROM air_conditioner WHERE deviceID = $airID";

    if ($conn->query($airSql) === TRUE) {
        // Insert corresponding entry into light table
        $deviceSql = "DELETE FROM device WHERE deviceID = $airID";

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
