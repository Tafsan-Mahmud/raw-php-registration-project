<?php
require '../db.php';
session_start();

$id = $_GET['id'];
$delete_frm_db = "DELETE FROM services WHERE id='$id'";
mysqli_query($db_connection, $delete_frm_db);
$_SESSION['service']= 'Service deleted Successfully';
header('location:services.php');


?>