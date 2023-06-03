<?php 
include '../database/config.php';
$userID = $_SESSION['user_id'];
$sql = "SELECT s.deviceID, s.operation, s.date, d.device_name FROM statistics AS s 
INNER JOIN device AS d ON s.deviceID = d.deviceID
INNER JOIN room AS r ON d.roomID = r.roomID
INNER JOIN user AS u ON r.userID = u.userID
WHERE u.userID = '$userID'";


$result = mysqli_query($conn, $sql);
$i = 1;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <th scope="row">' . $i . '</th>
                <td>' . $row['deviceID'] . '</td>
                <td>' . $row['device_name'] . '</td>
                <td>' . $row['operation'] . '</td>
                <td>' . $row['date'] . '</td>
            </tr>';
        $i += 1;
    }
}




?>