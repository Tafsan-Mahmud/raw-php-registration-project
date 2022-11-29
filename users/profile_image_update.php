<?php
session_start();
require '../db.php';
$id =  $_SESSION['ID'];
$upload_image = $_FILES['image'];
$after_explode = explode('.', $upload_image['name']);
$extention = end($after_explode);
$exten_to_LR = strtolower($extention);
$allowed_extention = array('jpg', 'png', 'gif', 'jpeg');

if (in_array($exten_to_LR, $allowed_extention)) {
    if ($upload_image['size'] <= 80000000) {
           $select = "SELECT * FROM user WHERE id='$id'";
           $result = mysqli_query($db_connection , $select);
           $after_assoc = mysqli_fetch_assoc($result);
           $delete_from ="../uploads/users/".$after_assoc['image'];
           unlink($delete_from);
           $file_name = $id.'.'.$exten_to_LR;
           $new_location = '../uploads/users/'.$file_name;
           move_uploaded_file($upload_image['tmp_name'], $new_location);
           $update_image = "UPDATE user SET image='$file_name' WHERE id=$id";
           mysqli_query($db_connection, $update_image);
           $_SESSION['update_profile'] = 'image Successfully updated';
           header('location:profile.php');
    } else {
        $_SESSION['image_err'] = 'image size must have 5mb';
        header('location:profile.php');
    }
} 
else {
    $_SESSION['image_err'] = 'image extention must have jpg. jpeg, gif, png';
           header('location:profile.php');
}
?>