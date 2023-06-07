<?php
include '../database/config.php';

$user_id = $_GET['userID'];
$room_id = $_GET['roomID'];

// Create a query to select all users from the users table


$sql3 = "SELECT * FROM room WHERE userID='$user_id' AND roomID = '$room_id'";
$result3 = mysqli_query($conn, $sql3);
if (mysqli_num_rows($result3) == 0) {

    echo "There is no device";
} else {

    // Execute the query and get the result set
    $sql = "SELECT * FROM device AS d
        INNER JOIN room AS r ON d.roomID = r.roomID
        WHERE d.roomID = '$room_id' AND 
        r.userID='$user_id';";
    $result = mysqli_query($conn, $sql);

    // Check if any users were found
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="container-fluid px-5">';
        echo '<div class="row g-4 my-2">';
        // Loop through the result set and display each user's data in a table row
        while ($row = mysqli_fetch_assoc($result)) {
            $deviceID = $row['deviceID'];
            if ($row['device_type'] == "light") {
                $sql2 = "SELECT * FROM light WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $isOpen = $row2['isOpen'];
                $color = $row2['color'];

                echo '<div class="col-md-4">
                <div class="p-5 bg-white shadow-sm d-flex flex-column justify-content-center align-items-center rounded">
                <h1>Light</h1>    
                <div>
                        <h3 class="fs-2">' . $row['device_name'] . '</h3>
                    </div>
                    <form action="../admin_php/update_light_status.php" method="post">
                        <input type="hidden" name="deviceID" value="' . $deviceID . '">
                        <div class="device-status">
                        <h3>Status</h3>    
                        <button type="submit" name="status" value="1" class="btn ' . ($isOpen == 1 ? 'btn-primary' : 'btn-secondary') . '">On</button>
                            <button type="submit" name="status" value="0" class="btn ' . ($isOpen == 0 ? 'btn-danger' : 'btn-secondary') . '">Off</button>
                        </div>
                    </form>
                    <div class="attribute">
                <h4>Color</h4>
            <div id="swatch">
             <form id="color-form" action="../admin_php/update_light_color.php" method="post">
            <input type="hidden" name="deviceID" value="' . $deviceID . '">
            <input type="color" id="color" name="color" value="' . $row2['color'] . '">
            <div class="info">
                <h1>Choose</h1>
                <h2>Color</h2>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
            </div>
             <br>
            <form action="../admin_php/delete_light.php" method="post" onsubmit="return confirmDelete()">
            <input type="hidden" name="lightID" value="' . $deviceID . '">
            <div class="device-status">   
            <input type="submit" name="status" value="Delete ' . $row['device_name'] . '" class="btn btn-danger" ></input>  
            </div>
        </form>
        
            </div>
            <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete?");
            }
            </script>
            </div>';
            } elseif ($row['device_type'] == "air conditioner") {
                $sql2 = "SELECT * FROM air_conditioner WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $isOpenAir = $row2['isOpen'];
                $temperatureAir = $row2['temperature'];
                $modeAir = $row2['mode'];

                echo '<div class="col-md-4">
                <div class="p-5 bg-white shadow-sm d-flex flex-column justify-content-center align-items-center rounded">
                <h1> Air Conditioner</h1>    
                <div>
                        <h3 class="fs-2">' . $row['device_name'] . '</h3>
                    </div>
                    <div class="device-status">
                        <div class="device-name"></div>
                        <form action="../admin_php/update_aircon_status.php" method="post">
                            <input type="hidden" name="deviceID" value="' . $deviceID . '">
                            <div class="aircon-status justify-content-center">
                                <h3>Status</h3> 
                                <button type="submit" name="statusAir" value="1" class="btn ' . ($isOpenAir == 1 ? 'btn-primary' : 'btn-secondary') . '">On</button>
                                <button type="submit" name="statusAir" value="0" class="btn ' . ($isOpenAir == 0 ? 'btn-danger' : 'btn-secondary') . '">Off</button>
                            </div>
                        </form>
                    </div>
                    <div class="device-status">
                        <div class="device-name"></div>
                        <form action="../admin_php/update_aircon_mode.php" method="post">
                            <input type="hidden" name="deviceID" value="' . $deviceID . '">
                            <div class="aircon-status">
                                <h3>Mode</h3>
                                <button type="submit" name="modeAir" value="ice" class="btn ' . ($modeAir == 'ice' ? 'btn-primary' : 'btn-secondary') . '">Ice</button>
                                <button type="submit" name="modeAir" value="sun" class="btn ' . ($modeAir == 'sun' ? 'btn-danger' : 'btn-secondary') . '">Sun</button>
                            </div>
                        </form>
                    </div>
                    <div class="attribute">
                        <h4>Temperature</h4>
                        <div class="air-conditioner-temperature">
                            <div class="mode-control">
                                <form action="../admin_php/update_aircon_temperature.php" method="post">
                                    <input type="hidden" name="deviceID" value="' . $deviceID . '">
                                    <input type="number" name="temperatureAir" id="temperature-input-' . $row['deviceID'] . '" class="temperature-input" value="' . $temperatureAir . '" name="temperature-' . $row['deviceID'] . '">
                                    <button type="submit" class="btn btn-primary" onclick="submitTemperature' . $row['deviceID'] . '()">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    <form action="../admin_php/delete_aircond.php" method="post" onsubmit="return confirmDelete()">
                        <input type="hidden" name="airID" value="' . $deviceID . '">
                        <div class="device-status">
                            <input type="submit" name="status" value="Delete ' . $row['device_name'] . '" class="btn btn-danger" ></input>
                        </div>
                    </form>
                </div>
                <script>
                    function confirmDelete() {
                        return confirm("Are you sure you want to delete?");
                    }
                </script>
            </div>
            
            <style>
                .mode-button[value="sun"] {
                    background-color: yellow;
                }
            
                .mode-button[value="ice"] {
                    background-color: blue;
                }
            </style>';
            } elseif ($row['device_type'] == "dishwasher") {
                $sql2 = "SELECT * FROM dishwasher WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $isOpenDishwasher = $row2['isOpen'];

                echo '<div class="col-md-4">
                <div class="p-5 bg-white shadow-sm d-flex flex-column justify-content-center align-items-center rounded">
                <h1>Dishwasher</h1>    
                <div>
                        <h3 class="fs-2">' . $row['device_name'] . '</h3>
                    </div>
                    <form action="../admin_php/update_dishwasher_status.php" method="post">
                        <input type="hidden" name="deviceID" value="' . $deviceID . '">
                        <div class="device-status">
                            <h3>Status</h3>
                            <button type="submit" name="statusDishwasher" value="1" class="btn ' . ($isOpenDishwasher == 1 ? 'btn-primary' : 'btn-secondary') . '">On</button>
                            <button type="submit" name="statusDishwasher" value="0" class="btn ' . ($isOpenDishwasher == 0 ? 'btn-danger' : 'btn-secondary') . '">Off</button>
                        </div>
                    </form>
                    <br>
                    <form action="../admin_php/delete_dishwasher.php" method="post" onsubmit="return confirmDelete()">
                        <input type="hidden" name="dishID" value="' . $deviceID . '">
                        <div class="device-status">
                            <input type="submit" name="status" value="Delete ' . $row['device_name'] . '" class="btn btn-danger" ></input>
                        </div>
                    </form>
                    <script>
                    function confirmDelete() {
                        return confirm("Are you sure you want to delete?");
                    }
                </script>
                </div>
            </div>';
            } elseif ($row['device_type'] == "electric blanket") {
                $sql2 = "SELECT * FROM electric_blanket WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $isOpenBlanket = $row2['isOpen'];

                echo '<div class="col-md-4">
                <div class="p-5 bg-white shadow-sm d-flex flex-column justify-content-center align-items-center rounded">
                    <h1> Blanket </h1>    
                <div>
                        <h3 class="fs-2">' . $row['device_name'] . '</h3>
                    </div>
                    <form action="../admin_php/update_electric_blanket_status.php" method="post">
                        <input type="hidden" name="deviceID" value="' . $deviceID . '">
                        <div class="device-status">
                            <h3>Status</h3>
                            <button type="submit" name="statusBlanket" value="1" class="btn ' . ($isOpenBlanket == 1 ? 'btn-primary' : 'btn-secondary') . '">On</button>
                            <button type="submit" name="statusBlanket" value="0" class="btn ' . ($isOpenBlanket == 0 ? 'btn-danger' : 'btn-secondary') . '">Off</button>
                        </div>
                    </form>
                    <br>
                    <form action="../admin_php/delete_blanket.php" method="post" onsubmit="return confirmDelete()">
                        <input type="hidden" name="blanketID" value="' . $deviceID . '">
                        <div class="device-status">
                            <input type="submit" name="status" value="Delete ' . $row['device_name'] . '" class="btn btn-danger" ></input>
                        </div>
                    </form>
                </div>
                <script>
                    function confirmDelete() {
                        return confirm("Are you sure you want to delete?");
                    }
                </script>
                </div>';
            } elseif ($row['device_type'] == "fan") {
                $sql2 = "SELECT * FROM fan WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $isOpenFan = $row2['isOpen'];
                $speedFan = $row2['speed'];

                echo
                '<div class="col-md-4">
                <div class="p-5 bg-white shadow-sm d-flex flex-column justify-content-center align-items-center rounded">
                <h1>Fan</h1>    
                <div>
                        <h3 class="fs-2">' . $row['device_name'] . '</h3>
                    </div>
                    <form action="../admin_php/update_fan_status.php" method="post">
                        <input type="hidden" name="deviceID" value="' . $deviceID . '">
                        <div class="device-status">
                            <h3>Status</h3>
                            <button type="submit" name="statusFan" value="1" class="btn ' . ($isOpenFan == 1 ? 'btn-primary' : 'btn-secondary') . '">On</button>
                            <button type="submit" name="statusFan" value="0" class="btn ' . ($isOpenFan == 0 ? 'btn-danger' : 'btn-secondary') . '">Off</button>
                        </div>
                    </form>
            
                    <h4>Speed</h4> 
                    <form action="../admin_php/update_fan_speed.php" method="post">
                        <input type="hidden" name="deviceID" value="' . $deviceID . '">
                        <div class="aircon-status">
                            <button type="submit" name="speedFan" value="slow" class="btn ' . ($speedFan == 'slow' ? 'btn-primary' : 'btn-secondary') . '">slow</button>
                            <button type="submit" name="speedFan" value="medium" class="btn ' . ($speedFan == 'medium' ? 'btn-success' : 'btn-secondary') . '">medium</button>
                            <button type="submit" name="speedFan" value="fast" class="btn ' . ($speedFan == 'fast' ? 'btn-danger' : 'btn-secondary') . '">fast</button>
                        </div>
                    </form>
                    <br>
                    <form action="../admin_php/delete_fan.php" method="post" onsubmit="return confirmDelete()">
                        <input type="hidden" name="fanID" value="' . $deviceID . '">
                        <div class="device-status">
                            <input type="submit" name="status" value="Delete ' . $row['device_name'] . '" class="btn btn-danger" ></input>
                        </div>
                    </form>
                    <script>
                    function confirmDelete() {
                        return confirm("Are you sure you want to delete?");
                    }
                </script>
                    </div>
            </div>';
            } elseif ($row['device_type'] == "robot toy") {
                $sql2 = "SELECT * FROM robot_toy WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $statusToy = $row2['isOpen'];

                echo '<div class="col-md-4">
                <div class="p-5 bg-white shadow-sm d-flex flex-column justify-content-center align-items-center rounded">
                <h1>Robot Toy</h1>    
                <div>
                        <h3 class="fs-2">' . $row['device_name'] . '</h3>
                    </div>
                    <form action="../admin_php/update_toy_status.php" method="post">
                        <input type="hidden" name="deviceID" value="' . $deviceID . '">
                        <div class="device-status">
                            <h3>Status</h3>
                            <button type="submit" name="statusToy" value="1" class="btn ' . ($statusToy == 1 ? 'btn-primary' : 'btn-secondary') . '">On</button>
                            <button type="submit" name="statusToy" value="0" class="btn ' . ($statusToy == 0 ? 'btn-danger' : 'btn-secondary') . '">Off</button>
                        </div>
                    </form>
                    <br>
                    <form action="../admin_php/delete_toy.php" method="post" onsubmit="return confirmDelete()">
                        <input type="hidden" name="toyID" value="' . $deviceID . '">
                        <div class="device-status">
                            <input type="submit" name="status" value="Delete ' . $row['device_name'] . '" class="btn btn-danger" ></input>
                        </div>
                    </form>
                    <script>
                    function confirmDelete() {
                        return confirm("Are you sure you want to delete?");
                    }
                </script>
                    </div>
            </div>';
            } elseif ($row['device_type'] == "robot vacuum cleaner") {
                $sql2 = "SELECT * FROM robot_vacum_cleaner WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $isOpenVacuum = $row2['isOpen'];
                $modeVacuum = $row2['mode'];

                echo '<div class="col-md-4">
                <div class="p-5 bg-white shadow-sm d-flex flex-column justify-content-center align-items-center rounded">
                <h1>Robot Vacuum</h1>    
                <div>
                        <h3 class="fs-2">' . $row['device_name'] . '</h3>
                    </div>
                    <form action="../admin_php/update_vacuum_status.php" method="post">
                        <input type="hidden" name="deviceID" value="' . $deviceID . '">
                        <div class="device-status">
                            <h3>Status</h3>
                            <button type="submit" name="isOpenVacuum" value="1" class="btn ' . ($isOpenVacuum == 1 ? 'btn-primary' : 'btn-secondary') . '">On</button>
                            <button type="submit" name="isOpenVacuum" value="0" class="btn ' . ($isOpenVacuum == 0 ? 'btn-danger' : 'btn-secondary') . '">Off</button>
                        </div>
                    </form>
            
                    <h4>Mode</h4> 
                    <form action="../admin_php/update_vacuum_mode.php" method="post">
                        <input type="hidden" name="deviceID" value="' . $deviceID . '">
                        <div class="aircon-status">
                            <button type="submit" name="modeVacuum" value="auto" class="btn ' . ($modeVacuum == 'auto' ? 'btn-primary' : 'btn-secondary') . '">slow</button>
                            <button type="submit" name="modeVacuum" value="spot" class="btn ' . ($modeVacuum == 'spot' ? 'btn-success' : 'btn-secondary') . '">medium</button>
                            <button type="submit" name="modeVacuum" value="edge" class="btn ' . ($modeVacuum == 'edge' ? 'btn-danger' : 'btn-secondary') . '">fast</button>
                        </div>
                    </form>
                    <br>
                    <form action="../admin_php/delete_vacuumcleaner.php" method="post" onsubmit="return confirmDelete()">
                        <input type="hidden" name="vacuumID" value="' . $deviceID . '">
                        <div class="device-status">
                            <input type="submit" name="status" value="Delete ' . $row['device_name'] . '" class="btn btn-danger" ></input>
                        </div>
                    </form>
                    <script>
                    function confirmDelete() {
                        return confirm("Are you sure you want to delete?");
                    }
                </script>
                    </div>
            </div>';
            } elseif ($row['device_type'] == "washing machine") {
                $sql2 = "SELECT * FROM washing_machine WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $isOpenWashingMachine = $row2['isOpen'];
                $modeWashingMachine = $row2['mode'];

                echo '<div class="col-md-4">
                <div class="p-5 bg-white shadow-sm d-flex flex-column justify-content-center align-items-center rounded">
                <h1>Wash Machine</h1>
                    <div>
                        <h3 class="fs-2">' . $row['device_name'] . '</h3>
                    </div>
                    <form action="../admin_php/update_washingmachine_status.php" method="post">
                        <input type="hidden" name="deviceID" value="' . $deviceID . '">
                        <div class="device-status">
                            <h3>Status</h3>
                            <button type="submit" name="isOpenWashingMachine" value="1" class="btn ' . ($isOpenWashingMachine == 1 ? 'btn-primary' : 'btn-secondary') . '">On</button>
                            <button type="submit" name="isOpenWashingMachine" value="0" class="btn ' . ($isOpenWashingMachine == 0 ? 'btn-danger' : 'btn-secondary') . '">Off</button>
                        </div>
                    </form>
            
                    <h4>Mode</h4> 
                    <form action="../admin_php/update_washingmachine_mode.php" method="post">
                        <input type="hidden" name="deviceID" value="' . $deviceID . '">
                        <div class="aircon-status">
                            <button type="submit" name="modeWashingMachine" value="wash" class="btn ' . ($modeWashingMachine == 'wash' ? 'btn-primary' : 'btn-secondary') . '">wash</button>
                            <button type="submit" name="modeWashingMachine" value="dry" class="btn ' . ($modeWashingMachine == 'dry' ? 'btn-danger' : 'btn-secondary') . '">dry</button>
                        </div>
                    </form>
                    <br>
                    <form action="../admin_php/delete_washingmachine.php" method="post" onsubmit="return confirmDelete()">
                        <input type="hidden" name="washingmachineID" value="' . $deviceID . '">
                        <div class="device-status">
                            <input type="submit" name="status" value="Delete ' . $row['device_name'] . '" class="btn btn-danger" ></input>
                        </div>
                    </form>
                    <script>
                    function confirmDelete() {
                        return confirm("Are you sure you want to delete?");
                    }
                </script>
                    </div>
            </div>';
            }
        }
        echo '</div>';
        echo '</div>';
    } else {
        echo "No Device Found";
    }
}

// Close the database connection
mysqli_close($conn);
