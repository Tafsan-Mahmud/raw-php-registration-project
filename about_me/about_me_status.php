<?php
session_start();
require '../db.php';

$id= $_GET['id'];
$all_sts_update = "UPDATE about_me SET status=0";
mysqli_query($db_connection,$all_sts_update);

$sts_update = "UPDATE about_me SET status=1 WHERE id=$id";
mysqli_query($db_connection,$sts_update);
$_SESSION['about_add']= 'Status Successfully Changed';
header('location:about_me.php');

?>