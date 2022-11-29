<?php

session_start();
require '../db.php';


$year = $_POST['year'];
$title = $_POST['title'];
$percentage = $_POST['percentage'];

$insert_edu = "INSERT INTO education(year, title, percentage)VALUES('$year', '$title', '$percentage')";
mysqli_query($db_connection, $insert_edu);
$_SESSION['edu_add']= 'Education added successfully';
header('location:education.php')
?>