<?php
    include "../database/config.php";
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM room WHERE userID = '$user_id' AND (temperature > 50 OR temperature < -10 OR humidity > 100 OR humidity < 0)";

    $result = mysqli_query($conn, $sql);
    
    $i = 1;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if($row['temperature'] > 50 || $row['temperature'] < -10 || $row['humidity'] < 0 || $row['humidity'] > 100)
            $error_message = "Sensor might be faulty. Contact with producer";
           
        echo '<tr>
                <th scope="row">' . $i . '</th>
                <td>' . $row['roomID'] . '</td>
                <td>' . $row['room_name'] . '</td>
                <td>' . $error_message . '</td>
            </tr>';
        $i += 1;
    }
}

    mysqli_close($conn);




?>