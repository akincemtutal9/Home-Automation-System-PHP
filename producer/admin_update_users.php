<?php
include '../php/session_admin.php';
include_once '../database/config.php';
if (count($_POST) > 0) {
    
    mysqli_query($conn, "UPDATE user SET name='" . mysqli_real_escape_string($conn ,$_POST['name']) . "', surname='" . mysqli_real_escape_string($conn ,$_POST['surname']) . "', phone_number='" . mysqli_real_escape_string($conn ,$_POST['phone_number']) . "', address='" . mysqli_real_escape_string($conn ,$_POST['address']) . "', email='". mysqli_real_escape_string($conn ,$_POST['email']) . "' WHERE userID='" . $_GET['userID'] . "'");

    $message = "Record Modified Successfully";
}
$result = mysqli_query($conn, "SELECT * FROM user WHERE userID='" . $_GET['userID'] . "'");
$row = mysqli_fetch_array($result);
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

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php echo $_SESSION['admin_name']  ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="../login-signup/login_form.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="user-page">
                <div class="user-info-board">
                    <h1>Edit Account <?php echo $row['name'] ?></h1>
                    <div class="user-infos">
                        <form name="editProfile" method="post" action="">
                            <div class="row">
                                <div name="name" class="col-md-6"><label class="labels">Name</label><input name="name" type="text" class="form-control form-control-sm" placeholder="first name" value=""></div>
                                <div name="surname" class="col-md-6"><label class="labels">Surname</label><input name="surname" type="text" class="form-control form-control-sm" value="" placeholder="surname"></div>
                            </div>
                            <div class="row">
                                <div name ="phone_number" class="col-md-12"><label class="labels">Mobile Number</label><input name="phone_number" type="text" class="form-control form-control-sm" placeholder="enter phone number" value=""></div>
                                <div name ="address" class="col-md-12"><label class="labels">Address Line 1</label><input name="address" type="text" class="form-control form-control-sm" placeholder="enter address line 1" value=""></div>
                                <div name ="email" class="col-md-12"><label class="labels">Email ID</label><input name="email" type="text" class="form-control form-control-sm" placeholder="enter email id" value=""></div>
                                
                            </div>
                            <div  class=" text-center"><input class="btn btn-primary profile-button w-100" name="submit" type="submit" value="Save Profile"></input></div>
                        </form>
                    </div>
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