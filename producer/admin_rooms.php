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

        .center-div {
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
        <?php include '../producer/admin_sidebar.php' ?>
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

                 <!--ADMIN dropdown-menu -->
                 <?php include '../producer/admin_dropdown.php'?>
            </nav>

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
                                                    <input type="checkbox" name="living-room-light" onchange="document.getElementById('light-form').submit();" <?php echo $status == "ON" ? "checked" : ""; ?>>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <form method="post" id="light-form">
                                                <input type="hidden" name="light" value="<?php echo $status == "ON" ? "off" : "on"; ?>">
                                            </form>

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
                                                <span class="span-big">Air-Conditioner</span>
                                                <label class="switch">
                                                    <input type="checkbox" name="air-conditioner-status">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <div class="attribute">
                                                <h4>Mode</h4>
                                                <div class="air-conditioner-modes">
                                                    <div class="mode-control">
                                                        <input type="radio" id="mode-sunny" class="modecontrol-radio" value="sunny" name="air-conditioner-mode">
                                                        <label for="mode-sunny" class="mode-label">
                                                            <i class="fas fa-sun fa-2xl"></i>
                                                        </label>
                                                    </div>
                                                    <div class="mode-control">
                                                        <input type="radio" id="mode-snowy" class="modecontrol-radio" value="snowy" name="air-conditioner-mode">
                                                        <label for="mode-snowy" class="mode-label">
                                                            <i class="fas fa-snowflake fa-2xl"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="attribute">
                                                <h4>Temperature</h4>
                                                <div class="air-conditioner-temperature">
                                                    <div class="mode-control">
                                                        <label for="mode-range-1" class="mode-label">20</label>
                                                        <input type="range" id="mode-range-1" class="modecontrol-radio" value="temperature" name="air-conditioner-temperature">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- <div class="device mv-2">
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
                                            </div> -->
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