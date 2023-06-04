<?php
include "../database/config.php";

$startDate = $_POST["datepicker-s"];
$endDate = $_POST["datepicker-e"];

$sql = "SELECT * FROM statistics WHERE date BETWEEN '$startDate' AND '$endDate'";
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
} else {
    echo "<tr><td colspan='2'>Veri bulunamadı.</td></tr>";
}

$conn->close();
?>