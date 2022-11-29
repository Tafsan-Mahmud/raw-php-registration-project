<?php

session_start();
require '../db.php';


$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desp = $_POST['desp'];

$insert_contact = "INSERT INTO contact(desp, address, phone, email)VALUES('$desp','$address', '$phone', '$email')";
mysqli_query($db_connection, $insert_contact);
$_SESSION['contact_add']= 'contact added successfully';
header('location:contact.php')
?>