<?php
require_once "../database/config.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deviceID = $_POST['deviceID'];
    $isOpen = $_POST['status'];
    $sql_check = "SELECT * FROM device WHERE deviceID = '$deviceID'";
    $result = mysqli_query($conn, $sql_check);
    $row = mysqli_fetch_assoc($result);

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


    if (!$conn) {
        die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
    }


    if (mysqli_query($conn, $sql)) {
        if($isOpen)
            $op = "".$row['device_type']." turned on.";
        else
            $op = "".$row['device_type']." turned off.";
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