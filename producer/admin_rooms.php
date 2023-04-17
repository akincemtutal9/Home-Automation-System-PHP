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

        .between-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .mv-2 {
            margin: 2rem 0;
            padding: 0.5rem;
        }

        .span-big {
            font-size: 1.5rem;
            font-weight: 500;
        }
        .center-div{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/adminstyle.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin Rooms</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user me-2"></i>Home Auto</div>
            <div class="list-group list-group-flush my-3">
                <a href="../producer/admin_page.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-calendar-alt me-2"></i>Dashboard</a>
                <a href="../producer/admin_rooms.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-door-open"></i> Rooms</a>
                <a href="../producer/admin_devices.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-hammer"></i> Devices</a>
                <a href="../producer/admin_consumers.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-user me-2"></i>Consumers</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-star me-2"></i>Reviews</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-message-dots me-2"></i>Messages</a>
                <a href="../login-signup/login_form.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0" style="color:black">Rooms</h2>
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





            <!-- <div id="check-device-buttons-container">
  <button id="check-device-button-id1" class="check-device-button">Check device 1</button>
  <button id="check-device-button-id2" class="check-device-button">Check device 2</button>
  <button id="check-device-button-id3" class="check-device-button">Check device 3</button>
</div>


<div id="new-views-container">
  <div class="new-view" style="display: none;">
    <p>This is the new view for device 1!</p>
    <button class="undo-button">Undo</button>
  </div>
  <div class="new-view" style="display: none;">
    <p>This is the new view for device 2!</p>
    <button class="undo-button">Undo</button>
  </div>
  <div class="new-view" style="display: none;">
    <p>This is the new view for device 3!</p>
    <button class="undo-button">Undo</button>
  </div>
</div> -->

            <div class="container-fluid px-5">
                <div class="row g-4 my-2">
                    <div class="col-lg-4">
                        <div class="p-5 bg-white shadow-sm d-flex flex-column justify-content-center align-items-center rounded">
                            <div class="text-center">
                                <h3 class="fs-2">Living Room</h3>
                                <p class="fs-5">x devices</p>
                            </div>
                            <br>
                            <button class="btn btn-primary mt-auto check-device-button">Check Devices</button>
                            <div class="new-view" style="display: none;">
                                <!-- <p>This is the new view for device 1!</p> -->

                                <div class="Scroll-Area">
                                    <div>
                                        <div class="device mv-2">
                                            <div class="device-status between-row">
                                                <span class="span-big">
                                                    Light
                                                </span>
                                                <label class="switch">
                                                    <input type="checkbox" name="living-room-light">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>

                                            <div class="attribute">
                                                <h4>Color</h4>
                                                <div id="swatch">
                                                    <input type="color" id="color" name="color-2" value="#FF0000">
                                                    <div class="info">
                                                        <h1>Choose</h1>
                                                        <h2>Color</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="device mv-2">
                                            <div class="device-status between-row">
                                                <span class="span-big">
                                                    Robot Vacuum Cleaner
                                                </span>
                                                <label class="switch">
                                                    <input type="checkbox">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <div class="attribute">
                                                <h4>Mode</h4>
                                                <div class="vacuum-cleaner-modes">
                                                    <div class="mode-control">
                                                        <input type="radio" id="mode-auto-1" class="modecontrol-radio" value="auto" name="vacuum-cleaner-name">
                                                        <label for="mode-auto-1" class="mode-label">
                                                            <span class="checkmark">Auto</span>
                                                        </label>
                                                    </div>
                                                    <div class="mode-control">
                                                        <input type="radio" id="mode-spot-1" class="modecontrol-radio" value="spot" name="vacuum-cleaner-name">
                                                        <label for="mode-spot-1" class="mode-label">
                                                            <span class="checkmark">Spot</span>
                                                        </label>
                                                    </div>
                                                    <div class="mode-control">
                                                        <input type="radio" id="mode-edge-1" class="modecontrol-radio" value="edge" name="vacuum-cleaner-name">
                                                        <label for="mode-edge-1" class="mode-label">
                                                            <span class="checkmark">Edge</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="device mv-2">
                                            <div class="device-status between-row">
                                                <span class="span-big">
                                                    Air-Conditioner
                                                </span>
                                                <label class="switch">
                                                    <input type="checkbox">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <div class="attribute">
                                                <h4>Mode</h4>
                                                <div class="air-conditioner-modes">
                                                    <div class="mode-control">
                                                        <input type="radio" id="mode-heat-1" class="modecontrol-radio" value="sun" name="air-conditioner-mode">
                                                        <label for="mode-heat-1" class="mode-label">
                                                            <i class="fas fa-sun fa-2xl"></i>
                                                        </label>
                                                    </div>
                                                    <div class="mode-control">
                                                        <input type="radio" id="mode-cold-1" class="modecontrol-radio" value="ice" name="air-conditioner-mode">
                                                        <label for="mode-cold-1" class="mode-label">
                                                            <i class="fas fa-snowflake fa-2xl"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="attribute">
                                                <h4>Temperature</h4>
                                                <div class="air-conditioner-temperature">
                                                    <div class="mode-control">
                                                        <label for="mode-range-1" class="mode-label">
                                                            20
                                                        </label>
                                                        <input type="range" id="mode-range-1" class="modecontrol-radio" value="temperature" name="temperature-1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="center-div">
                                    <button class="undo-button btn btn-primary">Undo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="p-5 bg-white shadow-sm d-flex flex-column justify-content-center align-items-center rounded">
                            <div class="text-center">
                                <h3 class="fs-2">Bedroom</h3>
                                <p class="fs-5">x devices</p>
                            </div>
                            <br>
                            <button class="btn btn-primary mt-auto check-device-button">Check Devices</button>
                            <div class="new-view" style="display: none;">
                                <p>This is the new view for device 1!</p>
                                <button class="undo-button">Undo</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="p-5 bg-white shadow-sm d-flex flex-column justify-content-center align-items-center rounded">
                            <div class="text-center">
                                <h3 class="fs-2">Bathroom</h3>
                                <p class="fs-5">x devices</p>
                            </div>
                            <br>
                            <button class="btn btn-primary mt-auto check-device-button">Check Devices</button>
                            <div class="new-view" style="display: none;">
                                <p>This is the new view for device 1!</p>
                                <button class="undo-button">Undo</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="p-5 bg-white shadow-sm d-flex flex-column justify-content-center align-items-center rounded">
                            <div class="text-center">
                                <h3 class="fs-2">Kids Room</h3>
                                <p class="fs-5">x devices</p>
                            </div>
                            <br>
                            <button class="btn btn-primary mt-auto check-device-button">Check Devices</button>
                            <div class="new-view" style="display: none;">
                                <p>This is the new view for device 1!</p>
                                <button class="undo-button">Undo</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="p-5 bg-white shadow-sm d-flex flex-column justify-content-center align-items-center rounded">
                            <div class="text-center">
                                <h3 class="fs-2">Kitchen</h3>
                                <p class="fs-5">x devices</p>
                            </div>
                            <br>
                            <button class="btn btn-primary mt-auto check-device-button">Check Devices</button>
                            <div class="new-view" style="display: none;">
                                <p>This is the new view for device 1!</p>
                                <button class="undo-button">Undo</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-5 bg-white shadow-sm d-flex flex-column justify-content-center align-items-center rounded">
                            <div class="text-center">
                                <h3 class="fs-2">Store Room</h3>
                                <p class="fs-5">x devices</p>
                            </div>
                            <br>
                            <button class="btn btn-primary mt-auto check-device-button">Check Devices</button>
                            <div class="new-view" style="display: none;">
                                <p>This is the new view for device 1!</p>
                                <button class="undo-button">Undo</button>
                            </div>
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
    <script src="../js/togglebutton.js"></script>
</body>

</html>