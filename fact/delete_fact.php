<?php
require '../db.php';
session_start();

$id = $_GET['id'];
$delete_frm_db = "DELETE FROM fact WHERE id='$id'";
mysqli_query($db_connection, $delete_frm_db);
$_SESSION['fact']= 'fact deleted Successfully';
header('location:fact.php');


?>