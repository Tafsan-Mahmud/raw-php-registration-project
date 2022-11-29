<?php
require '../db.php';
session_start();

$id = $_GET['id'];
$delete_frm_db = "DELETE FROM about_me WHERE id='$id'";
mysqli_query($db_connection, $delete_frm_db);

$_SESSION['about_add'] = 'About me successfully deleted';
header('location:about_me.php');
?>