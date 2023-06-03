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
                </div>
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
                    <div>
                        <h3 class="fs-2">' . $row['device_name'] . '</h3>
                    </div>
                    <div class="device-status">
                        <div class="device-name">
                        </div>
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
                    <div class="device-name">
                    </div>
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
                            <input type="number" name="temperatureAir"id="temperature-input-' . $row['deviceID'] . '" class="temperature-input" value="' . $temperatureAir . '" name="temperature-' . $row['deviceID'] . '">
                                <button type="submit" class="btn btn-primary" onclick="submitTemperature' . $row['deviceID'] . '()">Submit</button>
                            </div>
                            </form> 
                        </div>  
                    </div>
                </div>
                <style>
                    .mode-button[value="sun"] {
                        background-color: yellow;
                    }
        
                    .mode-button[value="ice"] {
                        background-color: blue;
                    }
                </style>
            </div>';
            } elseif ($row['device_type'] == "dishwasher") {
                $sql2 = "SELECT * FROM dishwasher WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name'] . "</h3>
                    </div>
                    <label class=\"switch\">
                        <input type=\"checkbox\" name=\"kitchen-dishwasher\">
                            <span class=\"slider round\"></span>
                    </label>
                </div>
            </div>";
            } elseif ($row['device_type'] == "electric blanket") {
                $sql2 = "SELECT * FROM electric_blanket WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name'] . "</h3>
                    </div>
                    <label class=\"switch\">
                        <input type=\"checkbox\" name=\"bedroom-blanket\">
                            <span class=\"slider round\"></span>
                    </label>
                </div>
            </div>";
            } elseif ($row['device_type'] == "fan") {
                $sql2 = "SELECT * FROM fan WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name'] . "</h3>
                    </div>
                    <label class=\"switch\">
                        <input type=\"checkbox\" name=\"kitchen-fan\">
                            <span class=\"slider round\"></span>
                    </label>
                </div>
                <div class=\"attribute\">
                    <h4>Speed</h4>
                    <div class=\"vacuum-cleaner-modes\">
                        <div class=\"mode-control\">
                            <input type=\"radio\" id=\"mode-slow-1\" class=\"modecontrol-radio\" value=\"auto\" name=\"fan-name\">
                            <label for=\"mode-slow-1\" class=\"mode-label\">
                                <span class=\"checkmark\">Slow</span>
                            </label>
                        </div>
                        <div class=\"mode-control\">
                            <input type=\"radio\" id=\"mode-medium-1\" class=\"modecontrol-radio\" value=\"spot\" name=\"fan-name\">
                            <label for=\"mode-medium-1\" class=\"mode-label\">
                                <span class=\"checkmark\">Medium</span>
                            </label>
                        </div>
                        <div class=\"mode-control\">
                            <input type=\"radio\" id=\"mode-fast-1\" class=\"modecontrol-radio\" value=\"edge\" name=\"fan-name\">
                            <label for=\"mode-fast-1\" class=\"mode-label\">
                                <span class=\"checkmark\">Fast</span>
                            </label>
                        </div>
                    </div>  
                </div>
                
            </div>";
            } elseif ($row['device_type'] == "robot toy") {
                $sql2 = "SELECT * FROM robot_toy WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name'] . "</h3>
                    </div>
                    <label class=\"switch\">
                        <input type=\"checkbox\" name=\"children-room-toy\">
                            <span class=\"slider round\"></span>
                    </label>
                </div>
            </div> ";
            } elseif ($row['device_type'] == "robot vacuum cleaner") {
                $sql2 = "SELECT * FROM robot_vacum_cleaner WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name'] . "</h3>
                    </div>
                    <label class=\"switch\">
                        <input type=\"checkbox\">
                            <span class=\"slider round\"></span>
                    </label>
                </div>
                <div class=\"attribute\">
                    <h4>Mode</h4>
                    <div class=\"vacuum-cleaner-modes\">
                        <div class=\"mode-control\">
                            <input type=\"radio\" id=\"mode-auto-1\" class=\"modecontrol-radio\" value=\"auto\" name=\"vacuum-cleaner-name\">
                            <label for=\"mode-auto-1\" class=\"mode-label\">
                                <span class=\"checkmark\">Auto</span>
                            </label>
                        </div>
                        <div class=\"mode-control\">
                            <input type=\"radio\" id=\"mode-spot-1\" class=\"modecontrol-radio\" value=\"spot\" name=\"vacuum-cleaner-name\">
                            <label for=\"mode-spot-1\" class=\"mode-label\">
                                <span class=\"checkmark\">Spot</span>
                            </label>
                        </div>
                        <div class=\"mode-control\">
                            <input type=\"radio\" id=\"mode-edge-1\" class=\"modecontrol-radio\" value=\"edge\" name=\"vacuum-cleaner-name\">
                            <label for=\"mode-edge-1\" class=\"mode-label\">
                                <span class=\"checkmark\">Edge</span>
                            </label>
                        </div>
                    </div>  
                </div>
                
            </div> ";
            } elseif ($row['device_type'] == "washing machine") {
                $sql2 = "SELECT * FROM washing_machine WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name'] . "</h3>
                    </div>
                    <label class=\"switch\">
                        <input type=\"checkbox\">
                            <span class=\"slider round\"></span>
                    </label>
                </div>
                <div class=\"attribute\">
                    <h4>Mode</h4>
                    <div class=\"vacuum-cleaner-modes\">
                        <div class=\"mode-control\">
                            <input type=\"radio\" id=\"mode-auto-1\" class=\"modecontrol-radio\" value=\"wash\" name=\"washing-machine-name-1\">
                            <label for=\"mode-auto-1\" class=\"mode-label\">
                                <span class=\"checkmark\">Wash</span>
                            </label>
                        </div>
                        <div class=\"mode-control\">
                            <input type=\"radio\" id=\"mode-spot-1\" class=\"modecontrol-radio\" value=\"spot\" name=\"washing-machine-name-1\">
                            <label for=\"mode-spot-1\" class=\"mode-label\">
                                <span class=\"checkmark\">Dry</span>
                            </label>
                        </div>
                    </div>  
                </div>
                
            </div> ";
            }
        }
    } else {
        echo "No Device Found";
    }
}

// Close the database connection
mysqli_close($conn);
