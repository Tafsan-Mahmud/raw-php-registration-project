<?php

session_start();
require '../db.php';

$icon = $_POST["icon"];
$count = $_POST["count"];
$title = $_POST["title"];


$insert = "INSERT INTO fact(icon,count,title)VALUES('$icon', '$count', '$title')";
mysqli_query($db_connection, $insert);
$_SESSION['fact'] = 'fact successfully added';
header('location:fact.php');



?>