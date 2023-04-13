<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/registerpasswordvalidation.js"></script>
    <title>Register Form</title>
</head>
<body>
    <div class="form-container">
        <form action="" method="post" onsubmit="return validateForm()" name="register_form">
            <h2>Register</h2>
            <input type="text" name="name" required placeholder="Enter your name">
            <input type="text" name="surname" required placeholder="Enter your last name">
            <input type="email" name="email" required placeholder="Enter your email">
            <input type="password" name="password" required placeholder="Enter your password">
            <input type="password" name="cpassword" required placeholder="Confirm your password">
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>            
            </select>
            <input type="submit" name="submit" value="register" class="form-btn">
            <p>Already have an account ? <a href="../login-signup/login_form.html">Login</a> </p>
        </form>
    </div>
</body>
</html>