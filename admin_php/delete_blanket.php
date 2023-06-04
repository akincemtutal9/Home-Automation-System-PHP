<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blanketID = $_POST['blanketID'];

    // Insert device into device table
    $blanketSql = "DELETE FROM electric_blanket WHERE deviceID = $blanketID";

    if ($conn->query($blanketSql) === TRUE) {
        // Insert corresponding entry into light table
        $deviceSql = "DELETE FROM device WHERE deviceID = $blanketID";

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
