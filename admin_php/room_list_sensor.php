<?php
include '../database/config.php';

if (isset($_SESSION['admin_id'])) {
    $user_id = $_SESSION['admin_id'];
   
} else {
   
    die('User is not found');
}


$sql = "SELECT * FROM room WHERE userID ='$user_id'";


$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $roomID = $row["roomID"];
        $_SESSION['roomID'] = $roomID;
        echo '<div class="col-md-4">
                    <div class="p-5 bg-white shadow-sm   rounded">
                        <div class="d-flex justify-content-around align-items-center">
                            <div >
                                <h3 class="fs-2">'. $row['roomID'] .' '. $row['room_name'] .'</h3>
                                <p class="fs-5"></p>
                            </div>

                            <img src="../images/icon1.png" alt="">
                        </div>
                        <div class="text-center">
                            <button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                                </svg>
                                Generate
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Room</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body h-100">
                                            <form action="" method="post">
                                                <div class="row w-100 m-auto ">
                                                    <div class="col-md-6 mt-2"><label class="labels">Temperature Lowest Limit</label><input type="text" class="form-control " placeholder="Enter min Temperature" value=""></div>
                                                    <div class="col-md-6 mt-2"><label class="labels">Temperature Highest Limit</label><input type="text" class="form-control" value="" placeholder="Enter max Temperature"></div>
                                                    <div class="col-md-6 mt-4"><label class="labels">Humidity Lowest Limit</label><input type="text" class="form-control" placeholder="Enter min Humidity" value=""></div>
                                                    <div class="col-md-6 mt-4"><label class="labels">Humidity Lowest Limit</label><input type="text" class="form-control" placeholder="Enter max Humidity" value=""></div>
                                                    
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
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
    echo "No users found";
}

mysqli_close($conn);
?>
