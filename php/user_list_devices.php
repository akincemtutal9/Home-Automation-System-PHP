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
                $isOpen = $row2['isOpen'];
                echo "<div class=\"device\">
                    <div class=\"device-status\">
                        <div class=\"device-name\">
                            <h3>" . $row['device_name']."</h3>
                        </div>
                        <form action=\"../admin_php/update_device_status.php\" method=\"post\">
                        <input type=\"hidden\" name=\"deviceID\" value=\"" . $row['deviceID'] . "\">
                        <div class=\"device-status\">
                            <button type=\"submit\" name=\"status\" value=\"1\" class=\"me-2 btn " . ($isOpen == 1 ? 'btn-primary' : 'btn-secondary') . "\">On</button>
                            <button type=\"submit\" name=\"status\" value=\"0\" class=\"btn " . ($isOpen == 0 ? 'btn-danger' : 'btn-secondary') . "\">Off</button>
                        </div>
                    </form>
                    </div>
                    
                    <div class=\"attribute \">
                        <h4>Color</h4>
                        
                        <div class=\"ps-2\" id=\"swatch\">
                        <form id=\"color-form\" action=\"../admin_php/update_light_color.php\" method=\"post\"><div class=\"d-flex\">
                            <input type=\"hidden\" name=\"deviceID\" value=\"" . $row['deviceID'] . "\">
                            <input type=\"color\" id=\"color\" name=\"color\" value=\"" . $row2['color'] . "\">
                            <div class=\"info\">
                                <h1>Choose</h1>
                                <h2>Color</h2>
                            </div>
                        </div>
                        <div class=\"ps-4\">
                            <button type=\"submit\" class=\"btn  mt-1 btn-primary\">Submit</button>
                         </div>
                    </form>
                            </div>
                        </div>
                    </div>
                    </div>";
            }

            elseif($row['device_type'] == "air conditioner") {
                $sql2 = "SELECT * FROM air_conditioner WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $isOpen = $row2['isOpen'];
                $mode = $row2['mode'];
                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name']."</h3>
                    </div>
                    <form action=\"../admin_php/update_device_status.php\" method=\"post\">
                        <input type=\"hidden\" name=\"deviceID\" value=\"" . $row['deviceID'] . "\">
                        <div class=\"device-status\">
                            <button type=\"submit\" name=\"status\" value=\"1\" class=\"me-2 btn " . ($isOpen == 1 ? 'btn-primary' : 'btn-secondary') . "\">On</button>
                            <button type=\"submit\" name=\"status\" value=\"0\" class=\"btn " . ($isOpen == 0 ? 'btn-danger' : 'btn-secondary') . "\">Off</button>
                        </div>
                    </form>
                </div>
                <div class=\"attribute\">
                    <h4>Mode</h4>
                    <div class=\"air-conditioner-modes\">
                        <form action=\"../php/update_ac_mode.php\" class=\"d-flex w-75 justify-content-around\"  method=\"post\">
                        <input type=\"hidden\" name=\"deviceID\" value=\"" . $row['deviceID'] . "\">
                            <div class=\"mode-control\">
                                <button type=\"submit\" name=\"mode\" value=\"hot\" class=\"text-white btn " . ($mode == "hot" ? 'btn-warning' : 'btn-secondary') . "\">
                                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-brightness-high-fill\" viewBox=\"0 0 16 16\">
                                    <path d=\"M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z\"></path>
                                </svg>
                          </button>
                            </div>
                            <div class=\"mode-control\">
                                <button type=\"submit\" name=\"mode\" value=\"cold\" class=\"text-white btn " . ($mode == "cold" ? 'btn-info' : 'btn-secondary') . "\">
                                    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-snow\" viewBox=\"0 0 16 16\">
                                        <path d=\"M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793V8.866l-3.4 1.963-.496 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.884-.237a.5.5 0 1 1 .26-.966l1.848.495L7 8 3.6 6.037l-1.85.495a.5.5 0 0 1-.258-.966l.883-.237-1.12-.646a.5.5 0 1 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849L7.5 7.134V3.207L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 1 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v3.927l3.4-1.963.496-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495L9 8l3.4 1.963 1.849-.495a.5.5 0 0 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-3.4-1.963v3.927l1.353 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5z\"></path>
                                    </svg>
                                </button>
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
                $isOpen = $row2['isOpen'];
                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name']."</h3>
                    </div>
                    <form action=\"../admin_php/update_device_status.php\" method=\"post\">
                        <input type=\"hidden\" name=\"deviceID\" value=\"" . $row['deviceID'] . "\">
                        <div class=\"device-status\">
                            <button type=\"submit\" name=\"status\" value=\"1\" class=\"me-2 btn " . ($isOpen == 1 ? 'btn-primary' : 'btn-secondary') . "\">On</button>
                            <button type=\"submit\" name=\"status\" value=\"0\" class=\"btn " . ($isOpen == 0 ? 'btn-danger' : 'btn-secondary') . "\">Off</button>
                        </div>
                    </form>
                </div>
            </div>";
            }

            elseif($row['device_type'] == "electric blanket") {
                $sql2 = "SELECT * FROM electric_blanket WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $isOpen = $row2['isOpen'];
                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name']."</h3>
                    </div>
                    <form action=\"../admin_php/update_device_status.php\" method=\"post\">
                        <input type=\"hidden\" name=\"deviceID\" value=\"" . $row['deviceID'] . "\">
                        <div class=\"device-status\">
                            <button type=\"submit\" name=\"status\" value=\"1\" class=\"me-2 btn " . ($isOpen == 1 ? 'btn-primary' : 'btn-secondary') . "\">On</button>
                            <button type=\"submit\" name=\"status\" value=\"0\" class=\"btn " . ($isOpen == 0 ? 'btn-danger' : 'btn-secondary') . "\">Off</button>
                        </div>
                    </form>
                </div>
            </div>";
            }

            elseif($row['device_type'] == "fan") {
                $sql2 = "SELECT * FROM fan WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $isOpen = $row2['isOpen'];
                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name']."</h3>
                    </div>
                    <form action=\"../admin_php/update_device_status.php\" method=\"post\">
                        <input type=\"hidden\" name=\"deviceID\" value=\"" . $row['deviceID'] . "\">
                        <div class=\"device-status\">
                            <button type=\"submit\" name=\"status\" value=\"1\" class=\"me-2 btn " . ($isOpen == 1 ? 'btn-primary' : 'btn-secondary') . "\">On</button>
                            <button type=\"submit\" name=\"status\" value=\"0\" class=\"btn " . ($isOpen == 0 ? 'btn-danger' : 'btn-secondary') . "\">Off</button>
                        </div>
                    </form>
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
                $isOpen = $row2['isOpen'];
                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name']."</h3>
                    </div>
                    <form action=\"../admin_php/update_device_status.php\" method=\"post\">
                        <input type=\"hidden\" name=\"deviceID\" value=\"" . $row['deviceID'] . "\">
                        <div class=\"device-status\">
                            <button type=\"submit\" name=\"status\" value=\"1\" class=\"me-2 btn " . ($isOpen == 1 ? 'btn-primary' : 'btn-secondary') . "\">On</button>
                            <button type=\"submit\" name=\"status\" value=\"0\" class=\"btn " . ($isOpen == 0 ? 'btn-danger' : 'btn-secondary') . "\">Off</button>
                        </div>
                    </form>
                </div>
            </div> ";
            }

            elseif($row['device_type'] == "robot vacuum cleaner") {
                $sql2 = "SELECT * FROM robot_vacum_cleaner WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $isOpen = $row2['isOpen'];
                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name']."</h3>
                    </div>
                    <form action=\"../admin_php/update_device_status.php\" method=\"post\">
                        <input type=\"hidden\" name=\"deviceID\" value=\"" . $row['deviceID'] . "\">
                        <div class=\"device-status\">
                            <button type=\"submit\" name=\"status\" value=\"1\" class=\"me-2 btn " . ($isOpen == 1 ? 'btn-primary' : 'btn-secondary') . "\">On</button>
                            <button type=\"submit\" name=\"status\" value=\"0\" class=\"btn " . ($isOpen == 0 ? 'btn-danger' : 'btn-secondary') . "\">Off</button>
                        </div>
                    </form>
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
                $isOpen = $row2['isOpen'];
                echo "<div class=\"device\">
                <div class=\"device-status\">
                    <div class=\"device-name\">
                        <h3>" . $row['device_name']."</h3>
                    </div>
                    <form action=\"../admin_php/update_device_status.php\" method=\"post\">
                        <input type=\"hidden\" name=\"deviceID\" value=\"" . $row['deviceID'] . "\">
                        <div class=\"device-status\">
                            <button type=\"submit\" name=\"status\" value=\"1\" class=\"me-2 btn " . ($isOpen == 1 ? 'btn-primary' : 'btn-secondary') . "\">On</button>
                            <button type=\"submit\" name=\"status\" value=\"0\" class=\"btn " . ($isOpen == 0 ? 'btn-danger' : 'btn-secondary') . "\">Off</button>
                        </div>
                    </form>
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
