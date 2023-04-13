<?php
include '../database/config.php';
if(isset($_POST['submit'])){

$name = mysqli_real_escape_string($conn , $_POST['name']);
$surname = mysqli_real_escape_string($conn , $_POST['surname']);
$email = mysqli_real_escape_string($conn , $_POST['email']);
$pass = md5($_POST['password']);
$cpass = md5($_POST['cpassword']);
$user_type = $_POST['user_type'];

$select = " SELECT * FROM user_admin WHERE email = '$email' && password = '$pass' ";

$result = mysqli_query($conn , $select);

if(mysqli_num_rows($result) > 0){
    $error[] = 'user already exist!';
}else{
    if($pass != $cpass){
        $error[]= 'password not matched!';
    }else{
        $insert = "INSERT INTO user_admin(name,surname,email,password,user_type)
                    VALUES ('$name','$surname','$email','$pass','$user_type')";
        
        mysqli_query($conn,$insert);
        header('location:../login-signup/login_form.php');
    }
}

}
?>