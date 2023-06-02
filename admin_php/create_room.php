<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST['userID'];
    $roomName = $_POST['room_name'];

    echo $userID;
    echo $roomName;
    // Insert device into device table
    $sql = "INSERT INTO room (userID,room_name,temperature,humidity,icon) VALUES ('$userID', '$roomName', '25','25','room')";

    if ($conn->query($sql) === TRUE) {
        // Insert corresponding entry into light table
            header("Location: " . $_SERVER["HTTP_REFERER"]); 
            exit();
        } 
        else {
            echo "Error inserting into light table: " . $conn->error;
        }
   
    // $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    // VALUES ('John', 'Doe', 'john@example.com')";
    
    // if ($conn->query($sql) === TRUE) {
    //   echo "New record created successfully";
    // } else {
    //   echo "Error: " . $sql . "<br>" . $conn->error;
    // }    
     $conn->close();
    }

?>
