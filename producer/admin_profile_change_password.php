<?php
include '../php/session_admin.php';
session_regenerate_id();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = $_SESSION['admin_id'];

    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    // Retrieve the form input values
    
    if($password != $cpassword){
        echo '<script>alert("Passwords do not match!");</script>';
    }else{
    // Perform the update query
    $query = "UPDATE user SET password = '$password' WHERE userID='$userID'";
    mysqli_query($conn, $query);

    // Redirect to a success page or do any additional processing
    header("Location:../producer/admin_profile.php",$userID);
    exit;
    }
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
    
    
    <title>Account</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include '../producer/admin_sidebar.php' ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0 text-dark">Account</h2>
                </div>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                 <!--ADMIN dropdown-menu -->
                 <?php include '../producer/admin_dropdown.php'?>
            </nav>

            <div class="user-page">
                <!--PROFILE SIDERBAR INCLUDE-->
                <?php include '../producer/admin_profile_sidebar.php' ?>
                
                <div class="user-info-board">
                    <h1>Change Password</h1>     
                        <form  class="pt-4" action="" method="post">
                            <div class="row ">
                                <div class="col-md-12"><label class="labels">New Password</label><input name="password" type="password" id="subject" name="subject" placeholder="Password"></div>
                                <div class="col-md-12"><label class="labels">Confirm New Password</label><input name= "cpassword" type="password" id="subject" name="subject" placeholder="Re-Password"></div>
                                <div class=" text-center"><input class="btn btn-primary profile-button w-100" type="submit" name="submit" value="Change Password" ></input></div>
                        </form>
                     
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
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