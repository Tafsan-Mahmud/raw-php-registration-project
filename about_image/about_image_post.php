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
            $insert_abt_img = "INSERT INTO about_image(image)VALUES('$name')";
            mysqli_query($db_connection, $insert_abt_img);
            $insert_id = mysqli_insert_id($db_connection);
            $file_name = $insert_id.'.'.$tlr_extention;
            $new_location = '../uploads/about/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'], $new_location);
            $update_abt_img = "UPDATE about_image SET image='$file_name' WHERE id=$insert_id";
            mysqli_query($db_connection, $update_abt_img);
            $_SESSION['abt_img_added']= 'image Successfully Added';
            header('location:about_image.php');
        }
        else{
            $_SESSION['abt_img_err']= 'image size must have- 2MB';
            header('location:about_image.php');
        }        
    }
    else{
        $_SESSION['abt_img_err']= 'image Extention must have ( jpg,  jpeg, png, gif )!';
        header('location:about_image.php');
    }
}
else{
    $_SESSION['abt_img_err']= 'please chose a image';
    header('location:about_image.php');
}




?>