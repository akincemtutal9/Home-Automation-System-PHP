<?php
include '../database/config.php';
include '../php/session_admin.php';
$sql = "SELECT name FROM user WHERE userID = " . $_GET['userID'];
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $odaAdi = $row['name'];
        
    }
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


    <div class="row g-4 my-2"></div>
    <div class="d-flex" id="wrapper">

        <?php include '../producer/admin_sidebar.php' ?>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Consumer <?php echo $odaAdi?></h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php include '../producer/admin_dropdown.php' ?>
            </nav>

            <div class="container-fluid px-5">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <div class="d-flex justify-content-end align-items-center">
                        <a href='../producer/admin_rooms.php' class="btn btn-danger btn-lg">
                            <span class="fw-bold">-</span> Go Back To Users
                        </a>
                    </div>
                    <div class="d-flex justify-content-start align-items-center">
                        <a href='../producer/admin_add_room.php?userID=<?php echo $_GET['userID'] ?>' class="btn btn-primary btn-lg">
                            <span class="fw-bold">+</span> Add More Room
                        </a>
                    </div>
                </div>


                <div class="container-fluid px-5">
                    <div class="row g-4 my-2">
                        <?php

                        $sql = "SELECT userID, roomID, room_name, temperature, humidity, icon FROM room WHERE userID = " . $_GET['userID'];

                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $roomID = $row["roomID"];
                                $userID = $row['userID'];
                                $_SESSION['userID'] = $userID;
                                $_SESSION['roomID'] = $roomID;
                                $sql2 = "SELECT COUNT(*) AS row_count FROM device WHERE roomID = '$roomID'; ";
                                $result2 = mysqli_query($conn, $sql2);
                                $row2 = mysqli_fetch_assoc($result2);
                        ?>
                                <div class="col-lg-6">
                                    <div class="p-5 bg-white shadow-sm d-flex flex-column justify-content-center align-items-center rounded">
                                        <div class="text-center">
                                            <h3 class="fs-2"><?php echo $row["room_name"]; ?></h3>
                                            <p class="fs-5"><?php echo $row2["row_count"]; ?> devices</p>
                                            <p class="fs-5"><?php echo $row["temperature"]; ?> temperature</p>
                                            <p class="fs-5"><?php echo $row["humidity"]; ?> humidity</p>
                                            
                                        </div>
                                        <br>
                                        <a href='../producer/admin_edit_room.php?userID=<?php echo $_GET['userID']; ?>&roomID=<?php echo $roomID; ?>' class="btn btn-primary mt-auto check-device-button">Edit Room <?php echo $row["room_name"]; ?></a>
                                        <br>
                                        <a href="../producer/admin_edit_devices.php?userID=<?php echo $_GET['userID']; ?>&roomID=<?php echo $roomID; ?>" class="btn btn-success mt-auto check-device-button">Devices In Room <?php echo $row["room_name"]; ?></a>
                                        <br>
                                        <form action="../admin_php/delete_room.php" method="post">
                                            <input type="hidden" name="deviceCount" value="<?php echo $row2["row_count"] ?>">
                                            <input type="hidden" name="userID" value="<?php echo $userID ?>">
                                            <input type="hidden" name="roomID" value="<?php echo $roomID ?>">
                                            <input type="submit" class="btn btn-danger mt-auto check-device-button" value="Delete Room <?php echo $row["room_name"]; ?>">
                                        </form>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "No rooms found";
                        }

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