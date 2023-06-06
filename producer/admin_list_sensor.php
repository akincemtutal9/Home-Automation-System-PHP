<?php
include '../php/session_admin.php';
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

        <?php include '../producer/admin_sidebar.php' ?>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Devices In Our System</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                 <?php include '../producer/admin_dropdown.php'?>
            </nav>



            <div class="container-fluid px-5">
                <div class="row g-4 my-2">
                    <?php 
                        $user_id = $_GET['userID'];
                        $sql = "SELECT * FROM room WHERE userID = '$user_id'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {

                            while ($row = mysqli_fetch_assoc($result)) {
                                $roomID = $row["roomID"];
                                $userID = $row['userID'];
                    
                    echo '    <div class="col-md-4">
                            <div class="p-5 bg-white shadow-sm   rounded">
                                <div class="d-flex justify-content-around align-items-center">
                                    <div >
                                        <h3 class="fs-2">'.$row['roomID'] .' '.$row['room_name'].'</h3>
                                        <p class="fs-5"></p>
                                    </div>

                                    <i class="'. $row['icon'] . '" style="color: #b6decd;"></i>
                                </div>
                                <div class="text-center">
                                    <button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal'.$row['roomID'].'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                                        </svg>
                                        Generate
                                    </button>
                                    <div class="modal fade" id="exampleModal'.$row['roomID'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Room</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body h-100">
                                                    <form action="../php/generate_data.php" method="post">
                                                        <input type="hidden" name="userid" value="'. $user_id.'">
                                                        <input type="hidden" name="roomid" value="'.$row['roomID'].'">
                                                        <div class="row w-100 m-auto ">
                                                            <div class="col-md-6 mt-2"><label class="labels">Temperature Lowest Limit</label><input type="text" name="min-temp" class="form-control " placeholder="Enter min Temperature"></div>
                                                            <div class="col-md-6 mt-2"><label class="labels">Temperature Highest Limit</label><input type="text" name="max-temp" class="form-control"  placeholder="Enter max Temperature"></div>
                                                            <div class="col-md-6 mt-4"><label class="labels">Humidity Lowest Limit</label><input type="text" name="min-humid" class="form-control" placeholder="Enter min Humidity"></div>
                                                            <div class="col-md-6 mt-4"><label class="labels">Humidity Lowest Limit</label><input type="text" name="max-humid" class="form-control" placeholder="Enter max Humidity"></div>
                                                            
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="submit" class="btn btn-primary">Generate</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                            
                        </div>';
                        
                            }
                        } else {
                            echo "No rooms found";
                        } 

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