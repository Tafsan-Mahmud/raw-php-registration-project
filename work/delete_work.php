<?php
require '../db.php';
session_start();

$id = $_GET['id'];
$finding_image_nm = "SELECT * FROM works WHERE id='$id'";
$finding_rslt = mysqli_query($db_connection, $finding_image_nm);
$after_assoc = mysqli_fetch_assoc($finding_rslt);
$delete_frm_lcl = '../uploads/work/'.$after_assoc['image'];
unlink($delete_frm_lcl);

$delete_frm_db = "DELETE FROM works WHERE id='$id'";
mysqli_query($db_connection, $delete_frm_db);

$_SESSION['work'] = 'work successfully deleted';
header('location:work.php');

?>