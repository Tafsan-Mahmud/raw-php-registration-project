<?php
require '../db.php';
session_start();

$id = $_GET['id'];

$select_image = "SELECT * FROM banner_img WHERE id=$id";
$result= mysqli_query($db_connection,$select_image);
$after_assoc = mysqli_fetch_assoc($result);
$delete_frm_lcl = '../uploads/banner_img/'.$after_assoc['image'];
unlink($delete_frm_lcl);
$delete_frm_db = "DELETE FROM banner_img WHERE id='$id'";
mysqli_query($db_connection, $delete_frm_db);
$_SESSION['banner_img']= 'image deleted Successfully';
header('location:banner_img.php');


?>