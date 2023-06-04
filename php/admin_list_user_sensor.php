<?php
include '../database/config.php';
$sql = "SELECT * FROM user WHERE user_type ='user'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<th scope=\"row\">" . $row["userID"] . "</th>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>";
        echo "<a href='../producer/admin_list_sensor.php?userID=" . $row["userID"] . "' class='btn btn-primary mt-auto'>Generate</a>";
        echo "</td>";
        echo "</tr>";
        }
} else {
    echo "No users found";
}

?>
