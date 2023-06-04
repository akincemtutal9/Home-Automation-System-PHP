<?php
include "../database/config.php";
if(isset($_POST['submit'])){
    $user_id= $_POST['userid'];
    $roomid = $_POST['roomid'];
    $min_temp = $_POST['min-temp'];
    $max_temp = $_POST['max-temp'];
    $min_humid = $_POST['min-humid'];
    $max_humid = $_POST['max-humid'];
    $random_temp = rand($min_temp, $max_temp);
    $random_humid = rand($min_humid, $max_humid);
    $sql_generate = "UPDATE room SET temperature = $random_temp, humidity = $random_humid WHERE roomID = $roomid";
    if ($conn->query($sql_generate) === TRUE) {
        header("location:../producer/admin_list_sensor.php?userID=" . $user_id . "");
    } else {
        echo "Error: " . $conn->error;
    }
    

}






?>