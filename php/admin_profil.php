<?php
include '../database/config.php';

$user_name = $_SESSION['admin_name'];

$user_id;

$sql2 = "SELECT * FROM user WHERE name = '$user_name'"; // Enclose $user_name with single quotes

$result2 = mysqli_query($conn, $sql2);

// Fetch the user ID from the result set
if ($row2 = mysqli_fetch_assoc($result2)) {
    $user_id = $row2['userID'];
}

// Create a query to select the user with the obtained user ID and additional condition
$sql = "SELECT * FROM user WHERE userID = '$user_id' AND name = '$user_name'"; // Enclose $user_id and $user_name with single quotes

$result = mysqli_query($conn, $sql);

// Check if any users were found
if (mysqli_num_rows($result) > 0) {
    // Loop through the result set and display each user's data in a table row
    $row = mysqli_fetch_assoc($result);
    echo "<div class=\"row \">
        <div class=\"col-md-6\"><label class=\"labels\">Name</label><input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"" . $row['name'] . "\" value=\"\" readonly></div>
        <div class=\"col-md-6\"><label class=\"labels\">Surname</label><input type=\"text\" class=\"form-control form-control-sm\" value=\"\" placeholder=\"" . $row['surname'] . "\" readonly></div>
    </div>
    <div class=\"row \">
        <div class=\"col-md-12\"><label class=\"labels\">Mobile Number</label><input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"" . $row['phone_number'] . "\" value=\"\" readonly></div>
        <div class=\"col-md-12\"><label class=\"labels\">Address Line 1</label><input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"" . $row['address'] . "\" value=\"\" readonly></div>
        <div class=\"col-md-12\"><label class=\"labels\">Email ID</label><input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"" . $row['email'] . "\" value=\"\" readonly></div>
        <div class=\"col-md-12\"><label class=\"labels\">Age</label><input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"" . $row['age'] . "\" value=\"\" readonly></div>
    </div>";

} else {
    echo "No users found";
}

// Close the database connection
mysqli_close($conn);
?>
