<?php
include '../php/session_user.php';
include '../database/config.php';
$user_name = $_SESSION['user_name'];

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM user WHERE userID = '$user_id' AND name = '$user_name'";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $email = $_POST['email'];
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
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user me-2"></i>Home Auto</div>
            <div class="list-group list-group-flush my-3">
                
                <a href="consumer.html" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-door-open"></i> Rooms</a>
                
                <a href="statistics.html" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-calendar-alt me-2"></i>Statistics</a>
                <a href="profil.html" class="list-group-item list-group-item-action bg-transparent second-text "><i class="fas fa-user me-2"></i>Account</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-star me-2"></i>Chart</a>
                <a href="../index.html" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
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
                                <i class="fas fa-user me-2"></i><?php echo $_SESSION['user_name']  ?>
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
                <div class="sidebar-user">
                    <div class="user-photo">
                        <img src="../images/profile.png" alt="user image">
                        <h3>John Doe</h3>
                    </div>
                    <div class="actions">
                        <ul>
                            <li><a href="profil.html" class="not-chosen"> My Account</a></li>
                            <li><a href="profiledit.html" class="chosen">Edit Account</a></li>
                            <li><a href="profilsupport.html" class="not-chosen">Support</a></li>
                            <li><a href="profilpassword.html" class="not-chosen">Change Password</a></li>
                        </ul>
                    </div>
                </div>
                <div class="user-info-board">
                    <h1>Edit Account</h1>
                    <div class="user-infos">
                        <div class="">
                            <form name="editProfile" method="post" action="">
                                <div class="row ">
                                    <div class="col-md-6"><label class="labels">Name</label><input type="text" name="name" class="form-control form-control-sm" placeholder="first name" value="<?php echo $_SESSION['user_name'] ?>"></div>
                                    <div class="col-md-6"><label class="labels">Surname</label><input type="text" name="surname" class="form-control form-control-sm" value="<?php echo $_SESSION['user_surname'] ?>" placeholder="surname"></div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" name="phone_number" class="form-control form-control-sm" placeholder="enter phone number" value="<?php echo $_SESSION['user_phonenumber'] ?>"></div>
                                    <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" name="address" class="form-control form-control-sm" placeholder="enter address line 1" value="<?php echo $_SESSION['user_address'] ?>"></div>
                                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" name="email" class="form-control form-control-sm" placeholder="enter email id" value="<?php echo $_SESSION['user_email'] ?>"></div>
                                    <div class="col-md-12"><label class="labels">Age</label><input type="text" name="age" class="form-control form-control-sm" placeholder="age" value="<?php echo $_SESSION['user_age'] ?>"></div>
                                </div>
                                <div class=" text-center"><button class="btn btn-primary profile-button w-100" type="submit">Save Profile</button></div>
                            </form>
                        </div>
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