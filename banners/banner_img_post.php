<?php

session_start();
require '../db.php';

$uploaded_file = $_FILES['image'];
$after_explod = explode('.',$uploaded_file['name']);
$name = $uploaded_file['name'];
$get_extention = end($after_explod);
$tlr_extention = strtolower($get_extention);
$alowed_extn = array('jpg', 'jpeg', 'gif', 'png');

if(!empty($uploaded_file['name'])){
    if(in_array($tlr_extention, $alowed_extn)){
        if($uploaded_file['size'] <= 9000000){
            $insert_image = "INSERT INTO banner_img(image)VALUES('$name')";
            mysqli_query($db_connection, $insert_image);
            $inserted_id = mysqli_insert_id($db_connection);
            $file_name = $inserted_id.'.'.$tlr_extention;
            $new_location = '../uploads/banner_img/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'], $new_location);
            $update_image = "UPDATE banner_img SET image='$file_name' WHERE id=$inserted_id";
            mysqli_query($db_connection, $update_image);
            $_SESSION['banner_img']= 'image Successfully Added';
            header('location:banner_img.php');
        }
        else{
            $_SESSION['banner_err']= 'image size must have- 2MB';
            header('location:banner_img.php');
        }        
    }
    else{
        $_SESSION['banner_err']= 'image Extention must have ( jpg,  jpeg, png, gif )!';
        header('location:banner_img.php');
    }
}
else{
    $_SESSION['banner_err']= 'please chose a image';
    header('location:banner_img.php');
}




?>