<?php
include '../php/session_admin.php';

// Assuming you have already established a database connection
// $conn = mysqli_connect("hostname", "username", "password", "database_name");

$room_id = $_GET['roomID'];

// Create a query to select the user with the obtained user ID and additional condition
$sql = "SELECT * FROM room WHERE roomID = '$room_id'"; // Enclose $user_id and $user_name with single quotes
        

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $room_id = $_GET['roomID'];
    // Retrieve the form input values
    $room_name = $_POST['room_name'];
    $temperature = $_POST['temperature'];
    $humidity = $_POST['humidity'];

    // Perform the update query
    $query = "UPDATE room SET room_name='$room_name', temperature='$temperature', humidity='$humidity' WHERE roomID = $room_id";
    mysqli_query($conn, $query);
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Loop through the result set and display each user's data in a table row
        $row = mysqli_fetch_assoc($result);
        echo $row;
    } else {
        echo "No editable found";
    }
   
    // Redirect to a success page or do any additional processing
    header("Location: ../producer/admin_edit_room.php?roomID=" . $room_id);
    exit;
}
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
    <script src="../js/deleteuser.js"></script>
    
    
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php 
        include '../producer/admin_sidebar.php';

        ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Consumers</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php include '../producer/admin_dropdown.php';?>
            </nav>

            <div class="container-fluid px-4">
                <div class="row my-5 mb-2">  
                    
                       <div class="text-center mb-4 ">
                        <h3>Edit Room Information</h3>
                        <p class="text-muted">Click update after changing any information</p>
                      </div>

                      <div class="container d-flex justify-content-center">
                        <form action="" method="post" style="width:50vw; min-width:300px;">                 
                          <div class="mb-3">
                            <label class="form-label bg-secondary text-white rounded w-25 text-center">Room Name:</label>
                            <input type="text" class="form-control" name="room_name" value="">
                          </div>

                          <div class="row mb-3">
                            <div class="col">
                              <label class="form-label bg-secondary text-white rounded w-50 text-center">Temperature:</label>
                              <input type="text" class="form-control" name="temperature" value="">
                            </div>
                  
                            <div class="col">
                              <label class="form-label bg-secondary text-white rounded w-25 text-center">Humidity:</label>
                              <input type="text" class="form-control" name="humidity" value="">
                            </div>
                          </div>
                  
                          <!-- <div class="mb-3">
                            <label class="form-label bg-secondary text-white rounded w-25 text-center">Icon:</label>
                            <select class="form-select" aria-label="Default select example">
                                <option value="1">Bedroom</option>
                                <option value="2">Kitchen</option>
                                <option value="3">Children Room</option>
                            </select>
                          </div>                   -->
                          <div class="text-center">
                            <input type="submit" class="btn btn-primary m-auto mt-2 " name="submit" value="Update"></input>
                            
                          </div>
                        </form>
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
</body>

</html>