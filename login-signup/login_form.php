<?php
include '../php/login.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login Form</title>
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h2>Login</h2>
            <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
            <input type="email" name="email" required placeholder="Enter your email">
            <input type="password" name="password" required placeholder="Enter your password">
            <input type="submit" name="submit" value="Login" class="form-btn">
            <p>Don't have an account ? <a href="../login-signup/register_form.php">Register</a> </p>
        </form>
    </div>
</body>
</html>