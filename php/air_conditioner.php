<?php
include '../database/config.php';

if (isset($_POST["air-conditioner"])) {
    $status = $_POST["air-conditioner"] == "on" ? "ON" : "OFF";
    $sql = "UPDATE air_conditioner SET status='$status' WHERE id=1";
    if ($conn->query($sql) === TRUE) {
        echo "Air conditioner turned $status successfully";
    } else {
        echo "Error turning $status air conditioner: " . $conn->error;
    }
}

if (isset($_POST["air-conditioner-weather"])) {
    $weather = $_POST["air-conditioner-weather"];
    $sql = "UPDATE air_conditioner SET weather='$weather' WHERE id=1";
    if ($conn->query($sql) === TRUE) {
        echo "Air conditioner weather set to $weather successfully";
    } else {
        echo "Error setting air conditioner weather: " . $conn->error;
    }
}

if (isset($_POST["air-conditioner-temperature"])) {
    $temperature = $_POST["air-conditioner-temperature"];
    $sql = "UPDATE air_conditioner SET temperature='$temperature' WHERE id=1";
    if ($conn->query($sql) === TRUE) {
        echo "Air conditioner temperature set to $temperature successfully";
    } else {
        echo "Error setting air conditioner temperature: " . $conn->error;
    }
}

$sql = "SELECT status, weather, temperature FROM air_conditioner WHERE id=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $status = $row["status"];
    $weather = $row["weather"];
    $temperature = $row["temperature"];
    echo "The air conditioner is currently $status and set to $temperature &deg;C in $weather weather<br>";
} else {
    echo "No results found";
}

$conn->close();
?>
