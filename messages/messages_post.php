<?php

session_start();
require '../db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$insert = "INSERT INTO messages(name, email, message)VALUES('$name', '$email', '$message')";
mysqli_query($db_connection, $insert);
$_SESSION['message'] = 'messege Successfully send';
header('location:/registration_project/index.php#contact');
?>