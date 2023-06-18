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
        <?php include '../producer/admin_sidebar.php' ?>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Add Room</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php include '../producer/admin_dropdown.php'?>
            </nav>

            <div class="container-fluid px-5">
                <div class="d-flex justify-content-start align-items-center w-100">
                    <a href='../producer/admin_check_rooms.php?userID=<?php echo $_GET['userID']?>' class="btn btn-danger btn-lg">
                        <span class="fw-bold">-</span> Go Back To Check Rooms
                    </a>
            </div>

            <div class="container-fluid px-4">
                <div class="row my-5 mb-2">
                    <div class="col-12 text-center">
                        <h3>Create Room</h3>
                        <p class="text-muted">Click create room button after creating room</p>
                    </div>

                    <div class="col-12 col-md-6 offset-md-3">
                        <form action="../admin_php/create_room.php?" method="post">
                            <div class="mb-3 d-flex-column align-items-center">
                                <input type="hidden" name="userID" value="<?php echo $_GET['userID'] ?>">
                                <label class="form-label rounded-pill px-3 py-2" style="color: #000000; font-weight: bold;">Room Name:</label>
                                <input type="text" class="form-control form-control-lg rounded-pill border-0 shadow flex-grow-1" name="room_name" value="" placeholder="Room Name" style="border-radius: 20px;">
                                <label class="form-label rounded-pill px-3 mt-3" style="color: #000000; font-weight: bold;">Icon Type:</label>
                                <select class="form-select form-select-lg rounded-pill border-0 shadow flex-grow-1" name="icon" aria-label="Default select example">
                                    <option value="fas fa-couch fa-3x">Living Room</option>
                                    <option value="fas fa-bed fa-3x">Bedroom</option>
                                    <option value="fas fa-shower fa-3x">Bathroom</option>
                                    <option value="fa-solid fa-refrigator fa-3x">Kitchen</option>
                                    <option value="fa-solid fa-children fa-3x">Children Room</option>
                                    <option value="fas fa-warehouse fa-3x">Storeroom</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary btn-lg mt-2 rounded-pill w-100" name="submit" value="Create Room" style="border-radius: 20px;">
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