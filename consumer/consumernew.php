<?php
include '../php/session_user.php';
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
    
    
    <title>Rooms</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <?php  include "consumer_sidebar.php"?>

            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 shadow-none">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-2 m-0 text-dark">Consumer</h2>
                    </div>
                    
                    <?php include 'navbar.php';?>

                <div class="room-container">
                    <?php

                        include '../php/user_list_room.php';
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

    <script>
        <?php
            include '../database/config.php';
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
            } else {
                die('User is not found');
            }

            $sqlt = "SELECT * FROM room WHERE userID ='$user_id'";
            $resultt = mysqli_query($conn, $sqlt);
            
            if (mysqli_num_rows($resultt) > 0) {
                while ($rowt = mysqli_fetch_assoc($resultt)) {
                    $temper= $rowt['temperature'];
                    $humidi= $rowt['humidity'];
                    echo 'function updateNumber' . $rowt['roomID'] . '() {
                          var temper =Math.random() * (' . $temper + 0.5 . ' - ' . $temper . ' + 1) + ' . $temper . ';
                          var humidi= Math.random() * (' . $humidi + 0.5 . ' - ' . $humidi . ' + 1) + ' . $humidi . ';
                          document.getElementById("t' . $rowt['roomID'] . '").textContent = temper.toFixed(2);
                          document.getElementById("h' . $rowt['roomID'] . '").textContent = humidi.toFixed(2);
                        
                          setTimeout(updateNumber' . $rowt['roomID'] . ', 4000);
                          } ';

                }
                    $resultt = mysqli_query($conn, $sqlt);
                   echo 'window.onload = function() {';
                    while ($rowt = mysqli_fetch_assoc($resultt)) {

                    echo 'updateNumber' . $rowt['roomID'] . '();';                   
                }
                    echo '};';

               
            }
        ?>
         </script>
    
</body>

</html>