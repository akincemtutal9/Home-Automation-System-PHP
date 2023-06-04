<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fanID = $_POST['fanID'];

    // Insert device into device table
    $fanSql = "DELETE FROM fan WHERE deviceID = $fanID";

    if ($conn->query($fanSql) === TRUE) {
        // Insert corresponding entry into light table
        $deviceSql = "DELETE FROM device WHERE deviceID = $fanID";

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
