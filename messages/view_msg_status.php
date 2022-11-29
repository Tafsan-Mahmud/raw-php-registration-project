<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$update_view = "UPDATE messages set status=1 WHERE id=$id";
mysqli_query($db_connection, $update_view);
header('location:messages.php')



?>