<?php
include '../php/session_admin.php';

$room_id = $_GET['roomID'];
$user_id = $_GET['userID'];

$sql = "SELECT * FROM room WHERE roomID = '$room_id'"; 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $room_id = $_GET['roomID'];
  $room_name = mysqli_real_escape_string($conn ,$_POST['room_name']);
  $temperature = $_POST['temperature'];
  $humidity = $_POST['humidity'];


  $query = "UPDATE room SET room_name='$room_name', temperature='$temperature', humidity='$humidity' WHERE roomID = $room_id";
  mysqli_query($conn, $query);
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);
    echo $row;
  } else {
    echo "No editable found";
  }

  header("Location: ../producer/admin_edit_room.php?userID=". $user_id ."&roomID=" . $room_id);
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

    <?php
    include '../producer/admin_sidebar.php';

    ?>

    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
          <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
          <h2 class="fs-2 m-0">Consumers</h2>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <?php include '../producer/admin_dropdown.php'; ?>
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
      <h3>Edit Room Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <div class="col-12 col-md-6 offset-md-3">
      <form action="" method="post">
        <div class="mb-3">
          <label class="form-label rounded-pill px-3 py-2 text-black text-center" style="font-weight: bold;">Room Name:</label>
          <input type="text" class="form-control rounded-pill border-0 shadow" name="room_name" value="">
        </div>

        <div class="row mb-3">
          <div class="col">
            <label class="form-label rounded-pill px-3 py-2  text-black text-center" style="font-weight: bold;">Temperature:</label>
            <input type="text" class="form-control rounded-pill border-0 shadow" name="temperature" value="">
          </div>

          <div class="col">
            <label class="form-label rounded-pill px-3 py-2  text-black text-center" style="font-weight: bold;">Humidity:</label>
            <input type="text" class="form-control rounded-pill border-0 shadow" name="humidity" value="">
          </div>
        </div>

        <!-- <div class="mb-3">
          <label class="form-label bg-secondary text-white rounded w-25 text-center">Icon:</label>
          <select class="form-select" aria-label="Default select example">
              <option value="1">Bedroom</option>
              <option value="2">Kitchen</option>
              <option value="3">Children Room</option>
          </select>
        </div> -->

        <div class="text-center">
          <input type="submit" class="btn btn-primary m-auto mt-2 rounded-pill w-100" name="submit" value="Update" style="border-radius: 20px;">
        </div>
      </form>
    </div>
  </div>
</div>

      </div>
    </div>
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