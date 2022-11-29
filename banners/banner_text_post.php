<?php

session_start();
require '../db.php';


$sub_title = $_POST['sub_title'];
$title = $_POST['title'];
$desp = $_POST['desp'];

$insert = "INSERT INTO banner_text(sub_title, title,desp)VALUES('$sub_title', '$title', '$desp')";
mysqli_query($db_connection, $insert);
$_SESSION['banners']= 'banner text added successfully';
header('location:banner_text.php')


?>