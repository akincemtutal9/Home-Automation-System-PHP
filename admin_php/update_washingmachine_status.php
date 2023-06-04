<?php
require_once "../database/config.php"; // Config dosyanızın yolunu doğru şekilde ayarlayın

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Parametreleri al
    $deviceID = $_POST['deviceID'];
    $statusWM = $_POST['isOpenWashingMachine'];

    // SQL sorgusu
    $sql = "UPDATE washing_machine SET isOpen = $statusWM WHERE deviceID = $deviceID";

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