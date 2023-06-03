<?php
require_once "../database/config.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deviceID = $_POST['deviceID'];
    $mode = $_POST['mode'];
    $sql_check = "SELECT * FROM device WHERE deviceID = '$deviceID'";
    $result = mysqli_query($conn, $sql_check);
    $row = mysqli_fetch_assoc($result);

    if($row['device_type'] == "air conditioner")
        $sql = "UPDATE air_conditioner SET mode = '$mode' WHERE deviceID = '$deviceID'";
    elseif($row['device_type'] == "fan")
        $sql = "UPDATE fan SET speed = '$mode' WHERE deviceID = $deviceID";
    elseif($row['device_type'] == "robot vacuum cleaner")
        $sql = "UPDATE robot_vacum_cleaner SET mode = '$mode' WHERE deviceID = $deviceID";
    elseif($row['device_type'] == "washing machine")
        $sql = "UPDATE washing_machine SET mode = '$mode' WHERE deviceID = $deviceID";


    if (!$conn) {
        die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
    }

    if (mysqli_query($conn, $sql)) {
        $op = "" . $row['device_type'] ." mode set to " . $mode .".";
        $date = date('Y/m/d H:i:sa');
        $sql_stat = "INSERT INTO statistics (deviceID, operation, date) VALUES ('$deviceID','$op','$date')";
        if ($conn->query($sql_stat) === TRUE) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . $sql_stat . "<br>" . $conn->error;
        }
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit();
    } else {
        echo "Güncelleme hatası: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
