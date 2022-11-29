<?php

session_start();
require '../db.php';


$about = $_POST['about'];
$desp = $_POST['desp'];

$insert_about = "INSERT INTO about_me(about_me, desp)VALUES('$about', '$desp')";
mysqli_query($db_connection, $insert_about);
$_SESSION['about_add']= 'About added successfully';
header('location:about_me.php')
?>