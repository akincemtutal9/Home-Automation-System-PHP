<?php
include_once '../database/config.php';
$result = mysqli_query($conn,"SELECT * FROM user");
?>
<!DOCTYPE html>
<html>
 <head>
   <title> Retrive data</title>
   <link rel="stylesheet" href="style.css">
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table>
	  <tr>
	    <td>Sl No</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>City</td>
		<td>Email id</td>
		<td>Action</td>
	  </tr>
			<?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
	  <tr>
	    <td><?php echo $row["userID"]; ?></td>
		<td><?php echo $row["name"]; ?></td>
		<td><?php echo $row["surname"]; ?></td>
		<td><?php echo $row["user_type"]; ?></td>
		<td><?php echo $row["email"]; ?></td>
		<td><a href="update_process.php?userID=<?php echo $row["userID"]; ?>">Update</a></td>
      </tr>
			<?php
			$i++;
			}
			?>
</table>
 <?php
}
else
{
    echo "No result found";
}
?>
 </body>
</html>