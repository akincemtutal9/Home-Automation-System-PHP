<?php
include '../database/config.php';

// Check if a user ID was provided via GET request
if (isset($_GET['userID'])) {
    // Get the user ID from the GET request
    $id = $_GET['userID'];

    // Create a query to delete the user with the provided ID
    $sql = "DELETE FROM user WHERE userID = $userid AND user_type ='user'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Redirect to the list_user.php page with a success message
        header("Location: ../producer/admin_consumers.php?success=1");
        exit();
    } else {
        // Redirect to the list_user.php page with an error message
        header("Location: ../producer/admin_consumers.php?error=1");
        exit();
    }
} else {
    // Redirect to the list_user.php page if no user ID was provided
    header("Location: ../producer/admin_consumers.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
