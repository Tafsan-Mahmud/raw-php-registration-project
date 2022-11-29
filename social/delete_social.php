<?php
require '../db.php';
session_start();

$id = $_GET['id'];
$delete_frm_db = "DELETE FROM social WHERE id='$id'";
mysqli_query($db_connection, $delete_frm_db);
$_SESSION['social']= 'icon deleted Successfully';
header('location:social.php');


?>