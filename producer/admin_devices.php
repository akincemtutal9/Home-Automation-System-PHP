<?php
include '../php/session_admin.php'
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
    <title>Admin Devices</title>
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
                    <h2 class="fs-2 m-0">Devices</h2>
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



            <div class="container-fluid px-5">
                <div class="row g-4 my-2">
                    <div class="col-md-4">
                        <div class="p-5 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">Beko Air Conditioner</h3>
                                <p class="fs-5"></p>
                            </div>
                            <!-- <i class="fas fa-car fs-1 primary-text border rounded-full secondary-bg p-3"></i> -->
                            <img src="../images/icon1.png" alt="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-5 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">Vacuum Cleaner</h3>
                                <p class="fs-5"></p>
                            </div>
                            <!-- <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i> -->
                            <img src="../images/icon2.png" alt="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-5 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">Washing Machine</h3>
                                <p class="fs-5"></p>
                            </div>
                            <!-- <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i> -->
                            <img src="../images/icon3.png" alt="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-5 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">Coffee Machine</h3>
                                <p class="fs-5"></p>
                            </div>
                            <!-- <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i> -->
                            <img src="../images/icon5.png" alt="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-5 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">Home Lights</h3>
                                <p class="fs-5"></p>
                            </div>
                            <!-- <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i> -->
                            <img src="../images/icon4.png" alt="">
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