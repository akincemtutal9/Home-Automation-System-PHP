<?php
include '../database/config.php';

// Create a query to select statistics, corresponding room names, device name, and room information
$sql = "SELECT statistics.*, room.room_name, room.roomID, device.device_name, user.name, user.surname
        FROM statistics
        JOIN device ON statistics.deviceID = device.deviceID
        JOIN room ON device.roomID = room.roomID
        JOIN user ON user.userID = room.userID";

// Execute the query and get the result set
$result = mysqli_query($conn, $sql);

// Check if any statistics were found
if (mysqli_num_rows($result) > 0) {
    // Loop through the result set and display each statistic's data in a table row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<th scope=\"row\">" . $row["deviceID"] . "</th>";
        echo "<td>" . $row["name"] ." " . $row["surname"] . "</td>";
        echo "<td>" . $row["device_name"] . "</td>";
        echo "<td>" . $row["operation"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["room_name"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "No statistics found";
}

// Close the database connection
mysqli_close($conn);
?>
