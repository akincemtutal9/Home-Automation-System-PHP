<?php
include '../database/config.php';

if (isset($_SESSION['user_id']) ) {
    $user_id = $_SESSION['user_id'];
   
} else {
   
    die('User is not found');
}
$user_id = $_SESSION['user_id'];
$room_id = $_GET['roomID'];
$_SESSION['room_ID'] = $room_id;

// Create a query to select all users from the users table


$sql3 = "SELECT * FROM room WHERE userID='$user_id' AND roomID = '$room_id'";
$result3 = mysqli_query($conn, $sql3);
if (mysqli_num_rows($result3) == 0){
    
    $url = "error.html";
    echo "<script>window.location.href = '$url';</script>";
}
else {
    
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
            $deviceID=$row['deviceID'];
            if($row['device_type'] == "light") {
                $sql2 = "SELECT * FROM light WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                
                echo "<div class=\"device\">
                    <div class=\"device-status\">
                        <div class=\"device-name\">
                            <h3>" . $row['device_name']."</h3>
                        </div>
                        <label class=\"switch\">
                            <input type=\"checkbox\" name=\"bedroom-light\">
                                <span class=\"slider round\"></span>
                        </label>
                    </div>
                    
                    <div class=\"attribute\">
                        <h4>Color</h4>

                        <div id=\"swatch\">
                            <input type=\"color\" id=\"color\" name=\"color-1\" value=\"". $row2['color'] ."\">
                            <div class=\"info\">
                            <h1>Choose</h1>
                            <h2>Color</h2>
                            </div>
                        </div>
                    </div>
                    </div>";
            }

            elseif($row['device_type'] == "air conditioner") {
                $sql2 = "SELECT * FROM air_conditioner WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                
                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name']."</h3>
                    </div>
                    <label class=\"switch\">
                        <input type=\"checkbox\" name=\"air-conditioner-" . $row['deviceID'] . "\">
                            <span class=\"slider round\"></span>
                    </label>
                </div>
                <div class=\"attribute\">
                    <h4>Mode</h4>
                    <div class=\"air-conditioner-modes\">
                        <form class=\"d-flex w-75 justify-content-around\"  id=\"form-" . $row['device_type'] . $row['deviceID'] . "\" method=\"post\">
                            <div class=\"mode-control\" onclick=\"submitForm" . $row['deviceID'] ."()\">
                                <input type=\"radio\"   id=\"mode-heat-" . $row['deviceID'] . "\" style=\"\" class=\"modecontrol-radio\" value=\"sun\" name=\"air-conditioner-mode-" . $row['deviceID'] . "\">
                                <label for=\"mode-heat-" . $row['deviceID'] . "\" class=\"mode-label\">
                                    <i class=\"fas fa-sun fa-2x\" ></i>
                                </label>
                            </div>
                            <div class=\"mode-control\" onclick=\"submitForm" . $row['deviceID'] ."()\">
                                <input type=\"radio\"   id=\"mode-cold-" . $row['deviceID'] . "\" class=\"modecontrol-radio\" value=\"ice\" name=\"air-conditioner-mode-" . $row['deviceID'] . "\">
                                <label for=\"mode-cold-" . $row['deviceID'] . "\" class=\"mode-label\">
                                    <i class=\"fas fa-snowflake fa-2x\" ></i>
                                </label>
                            </div>
                        </form>
                    </div>  
                </div>
                <div class=\"attribute\">
                    <h4>Temperature</h4>
                    <div class=\"air-conditioner-temperature\">
                        <div class=\"mode-control\">
                            <label for=\"mode-range-" . $row['deviceID'] . "\" class=\"mode-label\">
                                20
                            </label>
                            <input type=\"range\" id=\"mode-range-" . $row['deviceID'] . "\" class=\"modecontrol-radio\" value=\"temperature\" name=\"temperature-" . $row['deviceID'] . "\"> 
                        </div>
                    </div>  
                </div>
            </div>
            <style>
            .air-conditioner-modes input[type=\"radio\"][id=\"mode-heat-" . $row['deviceID'] ."\"]:checked + label{
                color: yellow;
              }
              
              .air-conditioner-modes .mode-control input[type=\"radio\"][id=\"mode-cold-" . $row['deviceID'] ."\"]:checked + label {
                color: aqua;
              }
            
            </style>
            
            ";
            
                
        }

            elseif($row['device_type'] == "dishwasher") {
                $sql2 = "SELECT * FROM dishwasher WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                
                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name']."</h3>
                    </div>
                    <label class=\"switch\">
                        <input type=\"checkbox\" name=\"kitchen-dishwasher\">
                            <span class=\"slider round\"></span>
                    </label>
                </div>
            </div>";
            }

            elseif($row['device_type'] == "electric blanket") {
                $sql2 = "SELECT * FROM electric_blanket WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                
                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name']."</h3>
                    </div>
                    <label class=\"switch\">
                        <input type=\"checkbox\" name=\"bedroom-blanket\">
                            <span class=\"slider round\"></span>
                    </label>
                </div>
            </div>";
            }

            elseif($row['device_type'] == "fan") {
                $sql2 = "SELECT * FROM fan WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                
                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name']."</h3>
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
            }

            elseif($row['device_type'] == "robot toy") {
                $sql2 = "SELECT * FROM robot_toy WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                
                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name']."</h3>
                    </div>
                    <label class=\"switch\">
                        <input type=\"checkbox\" name=\"children-room-toy\">
                            <span class=\"slider round\"></span>
                    </label>
                </div>
            </div> ";
            }

            elseif($row['device_type'] == "robot vacuum cleaner") {
                $sql2 = "SELECT * FROM robot_vacum_cleaner WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                
                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name']."</h3>
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
            }

            elseif($row['device_type'] == "washing machine") {
                $sql2 = "SELECT * FROM washing_machine WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                
                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name']."</h3>
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
        echo "No users found";
    } 
}
     


// Close the database connection
mysqli_close($conn);
?>
