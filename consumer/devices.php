<?php
include '../php/session_user.php';
include '../database/config.php';
if (isset($_SESSION['user_id']) ) {
    $user_id = $_SESSION['user_id'];
   
} else {
   
    die('User is not found');
}
$user_id = $_SESSION['user_id'];
$room_id = $_GET['roomID'];
$sql_room = "SELECT * FROM room WHERE userID='$user_id' AND roomID = '$room_id'";
$result_room = mysqli_query($conn, $sql_room);
$row_room = mysqli_fetch_assoc($result_room);
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
    <script src="../js/deleteuser.js"></script>
    <script src="../js/slider.js"></script>
    
    
    <title>Devices</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <?php  include "consumer_sidebar.php"?>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 shadow-none">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3 " id="menu-toggle"></i>
                    <h2 class="fs-2 m-0 text-dark">Devices</h2>
                </div>
            <?php include 'navbar.php';?>

            <div class="pt-2 d-flex col-sm-12 col-md-9 col-lg-10 col-xl-10">
                <button type="button" onclick="window.location.href='consumernew.php'" class="btn btn-outline-dark ms-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                    <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"></path>
                    </svg>
                    Back to Rooms
                </button>
                <h2 class="m-auto"><?php echo $row_room['room_name'];?></h2>
            </div>
            <div class="device-container">
                <?php
                    include '../php/user_list_devices.php';
                ?>
                    
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