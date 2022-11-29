<?php
session_start();
require '../db.php';
$id =  $_SESSION['ID'];
$name = $_POST['name'];
$old_password = $_POST['old_password'];
$password = $_POST['password'];
$password_hass = password_hash($password, PASSWORD_DEFAULT);

if(empty($old_password || $password)){
    $update_name = "UPDATE user SET name='$name' WHERE id=$id";
    mysqli_query($db_connection,$update_name);
    $_SESSION['update_profile']= 'Name Successfully updated';
    header('location:profile.php');
}
else{
    $select = "SELECT * FROM user WHERE id=$id";
    $result = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($result);
    if(password_verify($old_password, $after_assoc['password'])){
        $update_info = "UPDATE user SET name='$name', password='$password_hass' WHERE id=$id";
        mysqli_query($db_connection, $update_info);
        $_SESSION['update_profile']= 'Profile info Successfully updated';
        header('location:profile.php');
    }
    else{
        $_SESSION['old_pass_wrong']= 'old password dose not match';
        header('location:profile.php');
    }
}

?>