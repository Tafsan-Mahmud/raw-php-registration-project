<?php
require '../db.php';
session_start();

$id = $_GET['id'];
$finding_image_nm = "SELECT * FROM sponsers WHERE id='$id'";
$finding_rslt = mysqli_query($db_connection, $finding_image_nm);
$after_assoc = mysqli_fetch_assoc($finding_rslt);
$delete_frm_lcl = '../uploads/sponsers/'.$after_assoc['image'];
unlink($delete_frm_lcl);

$delete_frm_db = "DELETE FROM sponsers WHERE id='$id'";
mysqli_query($db_connection, $delete_frm_db);

$_SESSION['sponsers'] = 'review successfully deleted';
header('location:sponsers.php');

?>