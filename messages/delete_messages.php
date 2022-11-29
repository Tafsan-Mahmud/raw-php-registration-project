<?php
require '../db.php';
session_start();

$id = $_GET['id'];

$delete_frm_db = "DELETE FROM messages WHERE id='$id'";
mysqli_query($db_connection, $delete_frm_db);

$_SESSION['message'] = 'Message successfully deleted';
header('location:messages.php');

?>