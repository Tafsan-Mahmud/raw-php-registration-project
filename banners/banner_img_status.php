<?php
session_start();
require '../db.php';

$id= $_GET['id'];
$all_sts_update = "UPDATE banner_img SET status=0";
mysqli_query($db_connection,$all_sts_update);

$sts_update = "UPDATE banner_img SET status=1 WHERE id=$id";
mysqli_query($db_connection,$sts_update);
$_SESSION['banner_img']= 'Successfully Changed image Status';
header('location:banner_img.php');

?>