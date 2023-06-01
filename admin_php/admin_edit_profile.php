<?php 
include '../database/config.php';

$sql = "UPDATE user SET lastname='Doe' WHERE id=";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);

?>