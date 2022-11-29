<?php
require '../db.php';
session_start();

$id = $_GET['id'];
$delete_frm_db = "DELETE FROM contact WHERE id='$id'";
mysqli_query($db_connection, $delete_frm_db);

$_SESSION['contact_add'] = 'contact successfully deleted';
header('location:contact.php');
?>