<?php
include '../database/config.php';

// Create a query to select all users from the users table
$sql = "SELECT message.*, user.name FROM message JOIN user ON message.userID = user.userID";

// Execute the query and get the result set
$result = mysqli_query($conn, $sql);

// Check if any messages were found
if (mysqli_num_rows($result) > 0) {
    // Loop through the result set and display each message's data in a table row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<th scope=\"row\">" . $row["userID"] . "</th>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["subject"] . "</td>";
        echo "<td>" . $row["message"] . "</td>";
        echo "<td></td>";
        echo "</tr>";
    }
} else {
    echo "No messages found";
}

// Close the database connection
mysqli_close($conn);
?>
