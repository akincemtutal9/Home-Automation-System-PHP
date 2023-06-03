<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST['userID'];
    $roomID = $_POST['roomID'];
    $deviceCount = $_POST['deviceCount'];

    $sql = "DELETE FROM room WHERE userID = $userID AND roomID = $roomID ";

    if($deviceCount > 0){
        echo "<script>
        setTimeout(function() {
            alert('There are devices in room you have to delete them in order to delete room');
            window.location.href = '" . $_SERVER["HTTP_REFERER"] . "';
        }, 500);
        </script>";
    }
    else{
        if ($conn->query($sql) === TRUE) {
             echo "<script>
                setTimeout(function() {
                    alert('Deleted room successfully');
                    window.location.href = '" . $_SERVER["HTTP_REFERER"] . "';
                }, 500);
             </script>";
             } 
    else {
        echo "<script>
                setTimeout(function() {
                    alert('Odanın içinde cihazlar mevcut');
                }, 500);
             </script>";
        echo "Error deleting room: " . $conn->error;
    }
        }

    $conn->close();
}
?>
