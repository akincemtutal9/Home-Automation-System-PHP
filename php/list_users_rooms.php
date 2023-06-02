<?php
include '../database/config.php';
// Create a query to select all users from the users table
$sql = "SELECT * FROM user WHERE user_type ='user'";

// Execute the query and get the result set
$result = mysqli_query($conn, $sql);

// Check if any users were found
if (mysqli_num_rows($result) > 0) {
    // Loop through the result set and display each user's data in a table row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<th scope=\"row\">" . $row["userID"] . "</th>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>";
        echo "<a href='../producer/admin_check_rooms.php?userID=" . $row["userID"] . "' class='btn btn-primary mt-auto'>Check Rooms</a>";
        echo "<a href='../producer/admin_add_room.php?userID=" . $row["userID"] . "' class='btn btn-primary mt-auto give-me-space'>Add Room</a>";
        echo "</td>";
        echo "</tr>";
        }
} else {
    echo "No users found";
}

// Close the database connection
mysqli_close($conn);
?>
