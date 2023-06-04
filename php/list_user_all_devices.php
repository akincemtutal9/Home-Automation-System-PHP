<?php 
include '../database/config.php';
$userID = $_SESSION['user_id'];
$sql = "SELECT d.roomID, d.deviceID, d.device_name, d.device_type FROM device AS d
INNER JOIN room AS r ON d.roomID = r.roomID
INNER JOIN user AS u ON r.userID = u.userID
WHERE u.userID = '$userID'";

$result = mysqli_query($conn, $sql);
$i = 1;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <th scope="row">' . $i . '</th>
                <td>' . $row['roomID'] . '</td>
                <td>' . $row['deviceID'] . '</td>
                <td>' . $row['device_name'] . '</td>
                <td>' . $row['device_type'] . '</td>
            </tr>';
        $i += 1;
    }
}




?>