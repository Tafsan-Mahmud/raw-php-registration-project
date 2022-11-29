<?php
session_start();
require 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$finding_email = "SELECT COUNT(*) as exist FROM `user` WHERE email='$email'";
$res_processing = mysqli_query($db_connection, $finding_email);
$after_assoc = mysqli_fetch_assoc($res_processing);

if($after_assoc['exist'] == 1){
    $finding_pass = "SELECT * FROM user WHERE email= '$email'";
    $res_pass = mysqli_query($db_connection, $finding_pass);
    $after_assoc_pass = mysqli_fetch_assoc($res_pass);
    if(password_verify($password, $after_assoc_pass['password'])){
        $_SESSION['login_confirm'] = 'dashboard access allow';
        $_SESSION['ID'] = $after_assoc_pass['id'];
        header('location:dashboard.php');
    }
    else{
        $_SESSION['invalid'] = 'incorrect password';
        header('location:login.php');
    }
}
else{
    $_SESSION['invalid'] = 'email dose not exist';
    header('location:login.php');
}



?>