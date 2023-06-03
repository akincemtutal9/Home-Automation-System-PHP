<?php
require_once "../database/config.php"; // Adjust the path to your config file accordingly

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve parameters
    $deviceID = $_POST['deviceID'];
    $mode = $_POST['mode'];
    $sql_check = "SELECT * FROM device WHERE deviceID = '$deviceID'";
    $result = mysqli_query($conn, $sql_check);
    $row = mysqli_fetch_assoc($result);
    // SQL query (Note: Added single quotes around $color and $deviceID values)
    if($row['device_type'] == "air conditioner")
        $sql = "UPDATE air_conditioner SET mode = '$mode' WHERE deviceID = '$deviceID'";
    elseif($row['device_type'] == "fan")
        $sql = "UPDATE fan SET speed = '$mode' WHERE deviceID = $deviceID";
    elseif($row['device_type'] == "robot vacuum cleaner")
        $sql = "UPDATE robot_vacum_cleaner SET mode = '$mode' WHERE deviceID = $deviceID";
    elseif($row['device_type'] == "washing machine")
        $sql = "UPDATE washing_machine SET mode = '$mode' WHERE deviceID = $deviceID";

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
