<?php
require '../db.php';
session_start();

$id = $_GET['id'];

$select_logo = "SELECT * FROM logos WHERE id=$id";
$result= mysqli_query($db_connection,$select_logo);
$after_assoc = mysqli_fetch_assoc($result);
$delete_frm_lcl = '../uploads/logos/'.$after_assoc['logo'];
unlink($delete_frm_lcl);
$delete_frm_db = "DELETE FROM logos WHERE id='$id'";
mysqli_query($db_connection, $delete_frm_db);
$_SESSION['logo_added']= 'Logo deleted Successfully';
header('location:logo.php');


?>