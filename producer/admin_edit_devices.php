<?php
include '../php/session_admin.php';

$user_id = $_GET['userID'];
$room_id = $_GET['roomID'];

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
    <link rel="stylesheet" href="../css/user-account.css">
    <title>Admin Devices</title>
</head>

<body>
    <div class="d-flex" id="wrapper">

        <?php include '../producer/admin_sidebar.php' ?>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0" style="color: black;">Devices</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php include '../producer/admin_dropdown.php' ?>
            </nav>
            <div class="container-fluid px-5">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <div class="d-flex justify-content-end align-items-center">
                        <a href='../producer/admin_check_rooms.php?userID=<?php echo $_GET['userID'] ?>' class="btn btn-danger btn-lg">
                            <span class="fw-bold">-</span> Go Back To Rooms
                        </a>
                    </div>
                    <div class="d-flex justify-content-start align-items-center">
                    <a href="../producer/admin_add_device.php?userID=<?php echo $user_id ?>&roomID=<?php echo $room_id ?>" class="btn btn-primary btn-lg">
                            <span class="fw-bold">+</span> Add Device
                        </a>
                    </div>
                </div>
           
            <div class="row g-4 my-2">
                <?php

                include '../php/admin_list_room_devices.php'
                ?>
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