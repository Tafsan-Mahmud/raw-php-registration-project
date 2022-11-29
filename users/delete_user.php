<?php
session_start();
require '../db.php';


$id = $_GET['id'];
$_SESSION['isTrue']= 'true';
header("location:users.php?id=$id");
?>