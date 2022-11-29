<?php
require '../db.php';
session_start();

$id = $_GET['id'];
$select = "SELECT * FROM about_image WHERE id=$id";
$result_status = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($result_status);

if($after_assoc['status'] == 0){
    $select_abt_img = "SELECT * FROM about_image WHERE id=$id";
    $result= mysqli_query($db_connection,$select_abt_img);
    $after_assoc = mysqli_fetch_assoc($result);
    $delete_frm_lcl = '../uploads/about/'.$after_assoc['image'];
    unlink($delete_frm_lcl);
    $delete_frm_db = "DELETE FROM about_image WHERE id='$id'";
    mysqli_query($db_connection, $delete_frm_db);
    $_SESSION['abt_img_added']= 'Logo deleted Successfully';
    header('location:about_image.php');
}
else{
    $_SESSION['err_status'] = 'The image is active now so you can`t remove it!!. You can remove another one';
    header('location:about_image.php');
}



?>