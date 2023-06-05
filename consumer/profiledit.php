<?php
include '../php/session_user.php';
include '../database/config.php';


$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM user WHERE userID = '$user_id'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $name = mysqli_real_escape_string($conn ,$_POST['name']);
    $surname = mysqli_real_escape_string($conn ,$_POST['surname']);
    $phone_number = mysqli_real_escape_string($conn ,$_POST['phone_number']);
    $address = mysqli_real_escape_string($conn ,$_POST['address']);
    $email = mysqli_real_escape_string($conn ,$_POST['email']);
    $age = $_POST['age'];
    $query = "UPDATE user SET name='$name', surname='$surname', phone_number='$phone_number', address='$address', email='$email', age='$age' WHERE userID='$user_id'";
    mysqli_query($conn, $query);

    header("Location:profil.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        * {
            font-family: "Montserrat", sans-serif;
        }
    </style>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/adminstyle.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel='stylesheet' type='text/css' media='screen' href='../css/user-account.css'>
    <script src="../js/deleteuser.js"></script>
    
    
    <title>Edit Account</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <?php  include "consumer_sidebar.php"?>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0 text-dark">Account</h2>
                </div>
                
            <?php include 'navbar.php';?>

            <div class="user-page">
                <div class="sidebar-user">
                    <div class="user-photo">
                        <img src="../images/profile.png" alt="user image">

                        <h3><?php echo $_SESSION['user_name']  ?></h3>
                    </div>
                    <div class="actions">
                        <ul>
                            <li><a href="profil.php" class="not-chosen"> My Account</a></li>
                            <li><a href="profiledit.php" class="chosen">Edit Account</a></li>
                            <li><a href="profilsupport.php" class="not-chosen">Support</a></li>
                            <li><a href="profilpassword.php" class="not-chosen">Change Password</a></li>
                        </ul>
                    </div>
                </div>
                <div class="user-info-board">
                    <h1>Edit Account</h1>
                    <div class="user-infos">
                        <div class="">
                            <form name="editProfile" method="post" action="">
                                <div class="row ">
                                    <div class="col-md-6"><label class="labels">Name</label><input type="text" name="name" class="form-control form-control-sm" placeholder="first name" value="<?php echo $row['name'] ?>"></div>
                                    <div class="col-md-6"><label class="labels">Surname</label><input type="text" name="surname" class="form-control form-control-sm" value="<?php echo $row['surname'] ?>" placeholder="surname"></div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" name="phone_number" class="form-control form-control-sm" placeholder="enter phone number" value="<?php echo $row['phone_number'] ?>"></div>
                                    <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" name="address" class="form-control form-control-sm" placeholder="enter address line 1" value="<?php echo $row['address'] ?>"></div>
                                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" name="email" class="form-control form-control-sm" placeholder="enter email id" value="<?php echo $row['email'] ?>"></div>
                                    <div class="col-md-12"><label class="labels">Age</label><input type="text" name="age" class="form-control form-control-sm" placeholder="age" value="<?php echo $row['age'] ?>"></div>
                                </div>
                                <div class=" text-center"><button class="btn btn-primary profile-button w-100" type="submit">Save Profile</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>