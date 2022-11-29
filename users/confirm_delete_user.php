<?php
session_start();
require '../db.php';

    $id = $_GET['id'];
    $finding_image_nm = "SELECT * FROM user WHERE id='$id'";
    $finding_rslt = mysqli_query($db_connection, $finding_image_nm);
    $after_assoc = mysqli_fetch_assoc($finding_rslt);

    $delete_frm_lcl = '../uploads/users/'.$after_assoc['image'];
    unlink($delete_frm_lcl);
    $delete_frm_db = "DELETE FROM user WHERE id='$id'";
    mysqli_query($db_connection, $delete_frm_db);
    $_SESSION['succes_dlt_user']= 'succes';
    header('location:users.php');

?>