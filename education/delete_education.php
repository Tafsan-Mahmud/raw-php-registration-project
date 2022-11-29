<?php
require '../db.php';
session_start();

$id = $_GET['id'];


$delete_frm_db = "DELETE FROM education WHERE id='$id'";
mysqli_query($db_connection, $delete_frm_db);

$_SESSION['edu_add'] = 'Education successfully deleted';
header('location:education.php');
?>