<?php
include '../database/config.php';

if (isset($_POST["light"])) {
    $status = $_POST["light"] == "on" ? "ON" : "OFF";
    $sql = "UPDATE light SET status='$status' WHERE id=1";
    if ($conn->query($sql) === TRUE) {
        echo "Light turned $status successfully";
    } else {
        echo "Error turning $status light: " . $conn->error;
    }
}

$sql = "SELECT status FROM light WHERE id=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $status = $row["status"];
    echo "The light is currently " . $status . "<br>";
} else {
    echo "No results found";
}

$conn->close();
?>