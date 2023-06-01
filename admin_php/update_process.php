<?php
include_once '../database/config.php';
if (count($_POST) > 0) {
    
    mysqli_query($conn, "UPDATE user SET userID='" . $_POST['userID'] . "', name='" . $_POST['name'] . "', surname='" . $_POST['surname'] . "', user_type='" . $_POST['user_type'] . "' ,email='" . $_POST['email'] . "' WHERE userID='" . $_POST['userID'] . "'");
    $message = "Record Modified Successfully";
}
echo $_GET['userID'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE userID='" . $_GET['userID'] . "'");
$row = mysqli_fetch_array($result);
?>
<html>

<head>
    <title>Update Employee Data</title>
</head>

<body>
    <form name="frmUser" method="post" action="">
        <div><?php if (isset($message)) {
                    echo $message;
                } ?>
        </div>
        <div style="padding-bottom:5px;">
            <a href="../admin_php/edit_profile.php">Employee List</a>
        </div>
        Username: <br>
        <input type="hidden" name="userID" class="txtField" value="<?php echo $row['userID']; ?>">
        <input type="text" name="userID" value="<?php echo $row['userID']; ?>">
        <br>
        First Name: <br>
        <input type="text" name="name" class="txtField" value="<?php echo $row['name']; ?>">
        <br>
        Last Name :<br>
        <input type="text" name="surname" class="txtField" value="<?php echo $row['surname']; ?>">
        <br>
        City:<br>
        <input type="text" name="user_type" class="txtField" value="<?php echo $row['user_type']; ?>">
        <br>
        Email:<br>
        <input type="text" name="email" class="txtField" value="<?php echo $row['email']; ?>">
        <br>
        <input type="submit" name="submit" value="Submit" class="buttom">

    </form>
</body>

</html>