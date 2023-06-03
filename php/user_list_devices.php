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


$sql3 = "SELECT * FROM room WHERE userID='$user_id' AND roomID = '$room_id'";
$result3 = mysqli_query($conn, $sql3);
if (mysqli_num_rows($result3) == 0){
    
    $url = "error.html";
    echo "<script>window.location.href = '$url';</script>";
}
else {
    $sql = "SELECT * FROM device AS d
        INNER JOIN room AS r ON d.roomID = r.roomID
        WHERE d.roomID = '$room_id' AND 
        r.userID='$user_id';";
        $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        
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
                                <form id=\"color-form\" action=\"../admin_php/update_light_color.php\" method=\"post\">
                                    <div class=\"d-flex\">
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
                    </div>";
            }

            elseif($row['device_type'] == "air conditioner") {
                $sql2 = "SELECT * FROM air_conditioner WHERE deviceID ='$deviceID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $isOpen = $row2['isOpen'];
                $mode = $row2['mode'];
                $temperatureAir = $row2['temperature'];
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
                            <form action=\"../admin_php/update_aircon_temperature.php\" method=\"post\">
                                <input type=\"hidden\" name=\"deviceID\" value=\"" . $deviceID . "\">  
                                <label for=\"mode-range-" . $row['deviceID'] . "\" class=\"mode-label\">
                                    <span id=\"slider-range-" . $row['deviceID'] ."\">" . $temperatureAir ."</span>
                                </label>
                                <input type=\"range\"  min=\"16\" max=\"32\" oninput=\"updateSliderValue(this.value, 'slider-range-". $row['deviceID']."')\" id=\"mode-range-" . $row['deviceID'] . "\" class=\"modecontrol-radio\" value=\"". $temperatureAir ."\" name=\"temperatureAir\"> 
                                <button type=\"submit\" class=\"btn btn-primary\" onclick=\"submitTemperature" . $row['deviceID'] . "()\">Submit</button>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
            
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
                $mode = $row2['speed'];
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
                        <form class=\"d-flex w-100 justify-content-around\" action=\"../php/update_ac_mode.php\" method=\"post\">
                        <input type=\"hidden\" name=\"deviceID\" value=\"" . $row['deviceID'] . "\">
                            <div class=\"mode-control\">
                                <button type=\"submit\" name=\"mode\" value=\"slow\" class=\"btn " . ($mode == "slow" ? 'btn-primary' : 'btn-secondary') . "\">
                                    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-1-square\" viewBox=\"0 0 16 16\">
                                        <path d=\"M9.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383h1.312Z\"></path>
                                        <path d=\"M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2Zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2Z\"></path>
                                    </svg>
                                    Slow
                                </button>
                            </div>
                            <div class=\"mode-control\">
                                <button type=\"submit\" name=\"mode\" value=\"medium\" class=\"btn " . ($mode == "medium" ? 'btn-primary' : 'btn-secondary') . "\">
                                    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-2-square\" viewBox=\"0 0 16 16\">
                                        <path d=\"M6.646 6.24v.07H5.375v-.064c0-1.213.879-2.402 2.637-2.402 1.582 0 2.613.949 2.613 2.215 0 1.002-.6 1.667-1.287 2.43l-.096.107-1.974 2.22v.077h3.498V12H5.422v-.832l2.97-3.293c.434-.475.903-1.008.903-1.705 0-.744-.557-1.236-1.313-1.236-.843 0-1.336.615-1.336 1.306Z\"></path>
                                        <path d=\"M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2Zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2Z\"></path>
                                    </svg>
                                    Medium
                                </button>
                            </div>
                            <div class=\"mode-control\">
                                <button type=\"submit\" name=\"mode\" value=\"fast\" class=\"btn " . ($mode == "fast" ? 'btn-primary' : 'btn-secondary') . "\">
                                    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-3-square\" viewBox=\"0 0 16 16\">
                                        <path d=\"M7.918 8.414h-.879V7.342h.838c.78 0 1.348-.522 1.342-1.237 0-.709-.563-1.195-1.348-1.195-.79 0-1.312.498-1.348 1.055H5.275c.036-1.137.95-2.115 2.625-2.121 1.594-.012 2.608.885 2.637 2.062.023 1.137-.885 1.776-1.482 1.875v.07c.703.07 1.71.64 1.734 1.917.024 1.459-1.277 2.396-2.93 2.396-1.705 0-2.707-.967-2.754-2.144H6.33c.059.597.68 1.06 1.541 1.066.973.006 1.6-.563 1.588-1.354-.006-.779-.621-1.318-1.541-1.318Z\"></path>
                                        <path d=\"M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2Zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2Z\"></path>
                                    </svg>
                                    Fast
                                </button>
                            </div>
                        </div>  
                    </form>
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
                            <div class=\"vacuum-cleaner-modes\">
                                <form class=\"d-flex w-100 justify-content-around\" action=\"../php/update_ac_mode.php\" method=\"post\">
                                    <input type=\"hidden\" name=\"deviceID\" value=\"" . $row['deviceID'] . "\">
                                        <div class=\"mode-control\">
                                            <button type=\"submit\" name=\"mode\" value=\"auto\" class=\"btn " . ($mode == "auto" ? 'btn-primary' : 'btn-secondary') . "\">
                                                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-1-square\" viewBox=\"0 0 16 16\">
                                                    <path d=\"M9.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383h1.312Z\"></path>
                                                    <path d=\"M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2Zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2Z\"></path>
                                                </svg>
                                                Auto
                                            </button>
                                        </div>
                                        <div class=\"mode-control\">
                                            <button type=\"submit\" name=\"mode\" value=\"spot\" class=\"btn " . ($mode == "spot" ? 'btn-primary' : 'btn-secondary') . "\">
                                                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-2-square\" viewBox=\"0 0 16 16\">
                                                    <path d=\"M6.646 6.24v.07H5.375v-.064c0-1.213.879-2.402 2.637-2.402 1.582 0 2.613.949 2.613 2.215 0 1.002-.6 1.667-1.287 2.43l-.096.107-1.974 2.22v.077h3.498V12H5.422v-.832l2.97-3.293c.434-.475.903-1.008.903-1.705 0-.744-.557-1.236-1.313-1.236-.843 0-1.336.615-1.336 1.306Z\"></path>
                                                    <path d=\"M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2Zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2Z\"></path>
                                                </svg>
                                                Spot
                                            </button>
                                        </div>
                                        <div class=\"mode-control\">
                                            <button type=\"submit\" name=\"mode\" value=\"edge\" class=\"btn " . ($mode == "edge" ? 'btn-primary' : 'btn-secondary') . "\">
                                                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-3-square\" viewBox=\"0 0 16 16\">
                                                    <path d=\"M7.918 8.414h-.879V7.342h.838c.78 0 1.348-.522 1.342-1.237 0-.709-.563-1.195-1.348-1.195-.79 0-1.312.498-1.348 1.055H5.275c.036-1.137.95-2.115 2.625-2.121 1.594-.012 2.608.885 2.637 2.062.023 1.137-.885 1.776-1.482 1.875v.07c.703.07 1.71.64 1.734 1.917.024 1.459-1.277 2.396-2.93 2.396-1.705 0-2.707-.967-2.754-2.144H6.33c.059.597.68 1.06 1.541 1.066.973.006 1.6-.563 1.588-1.354-.006-.779-.621-1.318-1.541-1.318Z\"></path>
                                                    <path d=\"M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2Zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2Z\"></path>
                                                </svg>
                                                Edge
                                            </button>
                                        </div>
                                </form>
                            </div>  
                        </div>
                        
                    </div> ";
            }

            elseif($row['device_type'] == "washing machine") {
                $sql2 = "SELECT * FROM washing_machine WHERE deviceID ='$deviceID'";
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
                    <div class=\"vacuum-cleaner-modes\">
                    <form class=\"d-flex w-100 justify-content-around\" action=\"../php/update_ac_mode.php\" method=\"post\">
                    <input type=\"hidden\" name=\"deviceID\" value=\"" . $row['deviceID'] . "\">
                        <div class=\"mode-control\">
                            <button type=\"submit\" name=\"mode\" value=\"wash\" class=\"btn " . ($mode == "wash" ? 'btn-primary' : 'btn-secondary') . "\">
                                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-1-square\" viewBox=\"0 0 16 16\">
                                    <path d=\"M9.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383h1.312Z\"></path>
                                    <path d=\"M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2Zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2Z\"></path>
                                </svg>
                                Wash
                            </button>
                        </div>
                        <div class=\"mode-control\">
                            <button type=\"submit\" name=\"mode\" value=\"dry\" class=\"btn " . ($mode == "dry" ? 'btn-primary' : 'btn-secondary') . "\">
                                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-2-square\" viewBox=\"0 0 16 16\">
                                    <path d=\"M6.646 6.24v.07H5.375v-.064c0-1.213.879-2.402 2.637-2.402 1.582 0 2.613.949 2.613 2.215 0 1.002-.6 1.667-1.287 2.43l-.096.107-1.974 2.22v.077h3.498V12H5.422v-.832l2.97-3.293c.434-.475.903-1.008.903-1.705 0-.744-.557-1.236-1.313-1.236-.843 0-1.336.615-1.336 1.306Z\"></path>
                                    <path d=\"M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2Zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2Z\"></path>
                                </svg>
                                Dry
                            </button>
                        </div>
                </form>
                    </div>  
                </div>
                
            </div> ";
            }
        }
    } else {
        echo "No users found";
    } 
}
     
mysqli_close($conn);
?>
