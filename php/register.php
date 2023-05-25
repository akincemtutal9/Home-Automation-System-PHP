<?php
include '../database/config.php';
if(isset($_POST['submit'])){

$name = mysqli_real_escape_string($conn , $_POST['name']);
$surname = mysqli_real_escape_string($conn , $_POST['surname']);
$email = mysqli_real_escape_string($conn , $_POST['email']);
$pass = md5($_POST['password']);
$cpass = md5($_POST['cpassword']);
$phone_number = mysqli_real_escape_string($conn , $_POST['phone_number']);
$age = mysqli_real_escape_string($conn , $_POST['age']);
$address = mysqli_real_escape_string($conn , $_POST['address']);
$user_type = $_POST['user_type'];

$select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' ";

$result = mysqli_query($conn , $select);

if(mysqli_num_rows($result) > 0){
    $error[] = 'user already exist!';
}else{
    if($pass != $cpass){
        $error[]= 'password not matched!';
    }else{
        $insert = "INSERT INTO user(name,surname,email,password,user_type,phone_number,age,address)
                    VALUES ('$name','$surname','$email','$pass','$user_type','$phone_number','$age','$address')";
        
        mysqli_query($conn,$insert);
        header('location:../login-signup/login_form.php');
    }
}

}
?>