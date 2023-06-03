<?php
require_once "../database/config.php"; // Adjust the path to your config file accordingly

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve parameters
    $deviceID = $_POST['deviceID'];
    $mode = $_POST['mode'];

    // SQL query (Note: Added single quotes around $color and $deviceID values)
    $sql = "UPDATE air_conditioner SET mode = '$mode' WHERE deviceID = '$deviceID'";

    // Check if the database connection is successful
    if (!$conn) {
        die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
    }

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit();
    } else {
        echo "Güncelleme hatası: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
