<?php
require '../db.php';
session_start();

$id = $_GET['id'];
$delete_frm_db = "DELETE FROM banner_text WHERE id='$id'";
mysqli_query($db_connection, $delete_frm_db);

$_SESSION['banners'] = 'banner text successfully deleted';
header('location:banner_text.php');
?>