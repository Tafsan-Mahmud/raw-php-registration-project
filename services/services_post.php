<?php

session_start();
require '../db.php';

$icon = $_POST["icon"];
$name = $_POST["name"];
$desp = $_POST["desp"];


$insert = "INSERT INTO services(icon,name,desp)VALUES('$icon', '$name', '$desp')";
mysqli_query($db_connection, $insert);
$_SESSION['service'] = 'Service successfully added';
header('location:services.php');



?>