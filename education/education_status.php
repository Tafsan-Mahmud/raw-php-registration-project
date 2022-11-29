<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM education WHERE id=$id";
$result = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($result);
$finding = "SELECT COUNT(*) as active FROM education WHERE status=1";
$actv_res = mysqli_query($db_connection, $finding);
$actv_after_assoc = mysqli_fetch_assoc($actv_res);
if ($after_assoc['status'] == 0) {
    if ($actv_after_assoc['active'] < 4) {
        $sts_update = "UPDATE education SET status=1 WHERE id=$id";
        mysqli_query($db_connection, $sts_update);
        $_SESSION['edu_add'] = 'Successfully Change Status';
        header('location:education.php');
    } else {
        $_SESSION['edu_err_status'] = 'maximum 4 education can be active';
        header('location:education.php');
    }
} else {
    if ($actv_after_assoc['active'] > 3) {
        $sts_update = "UPDATE education SET status=0 WHERE id=$id";
        mysqli_query($db_connection, $sts_update);
        $_SESSION['edu_add'] = 'Successfully Change Status';
        header('location:education.php');
    } else {
        $_SESSION['edu_err_status'] = 'minimum 3 Education have to active';
        header('location:education.php');
    }
}



?>