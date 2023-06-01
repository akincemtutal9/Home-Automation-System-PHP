<?php
include '../database/config.php';
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
   
    die('User is not found');
}

// Create a query to select all users from the users table
$sql = "SELECT * FROM user WHERE userID ='$user_id'";

// Execute the query and get the result set
$result = mysqli_query($conn, $sql);

// Check if any users were found
if (mysqli_num_rows($result) > 0) {
    // Loop through the result set and display each user's data in a table row
    $row = mysqli_fetch_assoc($result);
        echo "<div class=\"row \">
        <div class=\"col-md-6\"><label class=\"labels\">Name</label><input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"". $row['name']."\" value=\"\" readonly></div>
        <div class=\"col-md-6\"><label class=\"labels\">Surname</label><input type=\"text\" class=\"form-control form-control-sm\" value=\"\" placeholder=\"". $row['surname']."\" readonly></div>
    </div>
    <div class=\"row \">
        <div class=\"col-md-12\"><label class=\"labels\">Mobile Number</label><input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"". $row['phone_number']."\" value=\"\" readonly></div>
        <div class=\"col-md-12\"><label class=\"labels\">Address Line 1</label><input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"". $row['address']."\" value=\"\" readonly></div>
        <div class=\"col-md-12\"><label class=\"labels\">Email ID</label><input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"". $row['email']."\" value=\"\" readonly></div>
        <div class=\"col-md-12\"><label class=\"labels\">Age</label><input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"". $row['age']."\" value=\"\" readonly></div>
    </div>";
    
} else {
    echo "No users found";
}

// Close the database connection
mysqli_close($conn);
?>
