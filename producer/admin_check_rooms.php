<?php
include '../database/config.php';
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
    <script src="../js/deleteuser.js"></script>
    
    
    <title>Admin Dashboard</title>
</head>

<body>


        <div class="row g-4 my-2"></div>
<div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include '../producer/admin_sidebar.php' ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Consumer <?php $_GET['userID']?></h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--ADMIN dropdown-menu -->
                <?php include '../producer/admin_dropdown.php'?>
            </nav>
            <div class="container-fluid px-5">
    <div class="row g-4 my-2">
        <?php
        // Create a query to select all users from the users table
        $sql = "SELECT userID, roomID, room_name, temperature, humidity, icon FROM room WHERE userID = " . $_GET['userID'];

        // Execute the query and get the result set
        $result = mysqli_query($conn, $sql);

        // Check if any users were found
        if (mysqli_num_rows($result) > 0) {
            // Loop through the result set and display each user's data in a table row
            while ($row = mysqli_fetch_assoc($result)) {
                $roomID = $row["roomID"];
                $userID = $row['userID'];
                $_SESSION['userID'] = $userID;
                $_SESSION['roomID'] = $roomID;
                $sql2 = "SELECT COUNT(*) AS row_count FROM device WHERE roomID = '$roomID'; ";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                ?>
                <div class="col-lg-4">
                    <div class="p-5 bg-white shadow-sm d-flex flex-column justify-content-center align-items-center rounded">
                        <div class="text-center">
                            <h3 class="fs-2"><?php echo $row["room_name"]; ?></h3>
                            <p class="fs-5"><?php echo $row2["row_count"]; ?> devices</p>
                            <p class="fs-5"><?php echo $row["temperature"]; ?> temperature</p>
                            <p class="fs-5"><?php echo $row["humidity"]; ?> humidity</p>
                            <p class="fs-5"><?php echo $row["icon"]; ?> icon</p>
                        </div>
                        <br>
                        <a href='../producer/admin_edit_room.php?roomID=<?php echo $roomID?>' class="btn btn-primary mt-auto check-device-button">Edit Room</a>
                        <br>
                        <a href="../producer/admin_edit_devices.php?userID=<?php echo $_GET['userID']; ?>&roomID=<?php echo $roomID; ?>" class="btn btn-primary mt-auto check-device-button">Edit Devices</a>


                    </div>
                </div>
                <?php
            }
        } else {
            echo "No rooms found";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
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





