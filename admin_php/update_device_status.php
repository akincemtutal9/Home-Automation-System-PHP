<?php
require_once "../database/config.php"; // Config dosyanızın yolunu doğru şekilde ayarlayın

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Parametreleri al
    $deviceID = $_POST['deviceID'];
    $isOpen = $_POST['status'];
    $sql_check = "SELECT * FROM device WHERE deviceID = '$deviceID'";
    $result = mysqli_query($conn, $sql_check);
    $row = mysqli_fetch_assoc($result);
    // SQL sorgusu
    if($row['device_type'] == "light")
        $sql = "UPDATE light SET isOpen = $isOpen WHERE deviceID = $deviceID";
    elseif($row['device_type'] == "air conditioner")
        $sql = "UPDATE air_conditioner SET isOpen = $isOpen WHERE deviceID = $deviceID";
    elseif($row['device_type'] == "dishwasher")
        $sql = "UPDATE dishwasher SET isOpen = $isOpen WHERE deviceID = $deviceID";
    elseif($row['device_type'] == "electric blanket")
        $sql = "UPDATE electric_blanket SET isOpen = $isOpen WHERE deviceID = $deviceID";
    elseif($row['device_type'] == "fan")
        $sql = "UPDATE fan SET isOpen = $isOpen WHERE deviceID = $deviceID";
    elseif($row['device_type'] == "robot toy")
        $sql = "UPDATE robot_toy SET isOpen = $isOpen WHERE deviceID = $deviceID";
    elseif($row['device_type'] == "robot vacuum cleaner")
        $sql = "UPDATE robot_vacum_cleaner SET isOpen = $isOpen WHERE deviceID = $deviceID";
    elseif($row['device_type'] == "washing machine")
        $sql = "UPDATE washing_machine SET isOpen = $isOpen WHERE deviceID = $deviceID";


    // Bağlantıyı kapatmadan önce bağlantıyı kontrol edin
    if (!$conn) {
        die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
    }

    // Sorguyu çalıştır
    if (mysqli_query($conn, $sql)) {
        header("Location: " . $_SERVER["HTTP_REFERER"]); 
        exit();
    } else {
        echo "Güncelleme hatası: " . mysqli_error($conn);
    }

    // Veritabanı bağlantısını kapat
    mysqli_close($conn);
}
?>