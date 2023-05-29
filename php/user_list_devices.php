<?php
include '../database/config.php';


$room_id = $_GET['roomID'];
// Create a query to select all users from the users table
$sql = "SELECT * FROM device WHERE roomID ='$room_id'";

// Execute the query and get the result set
$result = mysqli_query($conn, $sql);

// Check if any users were found
if (mysqli_num_rows($result) > 0) {
    // Loop through the result set and display each user's data in a table row
    while ($row = mysqli_fetch_assoc($result)) {
        $deviceID=$row['deviceID'];
        if($row['device_type'] == "light") {
            $sql2 = "SELECT * FROM light WHERE deviceID ='$deviceID'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            
            echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name']."</h3>
                    </div>
                    <label class=\"switch\">
                        <input type=\"checkbox\" name=\"bedroom-light\">
                            <span class=\"slider round\"></span>
                    </label>
                </div>
                
                <div class=\"attribute\">
                    <h4>Color</h4>

                    <div id=\"swatch\">
                        <input type=\"color\" id=\"color\" name=\"color-1\" value=\"". $row2['color'] ."\">
                        <div class=\"info\">
                        <h1>Choose</h1>
                        <h2>Color</h2>
                        </div>
                    </div>
                </div>
                </div>";
        }
    }
} else {
    echo "No users found";
}

// Close the database connection
mysqli_close($conn);
?>
