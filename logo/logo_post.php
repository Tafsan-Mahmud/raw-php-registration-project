<?php

session_start();
require '../db.php';

$uploaded_file = $_FILES['logo'];
$after_explod = explode('.',$uploaded_file['name']);
$name = $uploaded_file['name'];
$get_extention = end($after_explod);
$tlr_extention = strtolower($get_extention);
$alowed_extn = array('jpg', 'jpeg', 'gif', 'png');

if(!empty($uploaded_file['name'])){
    if(in_array($tlr_extention, $alowed_extn)){
        if($uploaded_file['size'] <= 9000000){
            $insert_logo = "INSERT INTO logos(logo)VALUES('$name')";
            mysqli_query($db_connection, $insert_logo);
            $insert_id = mysqli_insert_id($db_connection);
            $file_name = $insert_id.'.'.$tlr_extention;
            $new_location = '../uploads/logos/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'], $new_location);
            $update_logo = "UPDATE logos SET logo='$file_name' WHERE id=$insert_id";
            mysqli_query($db_connection, $update_logo);
            $_SESSION['logo_added']= 'Logo Successfully Added';
            header('location:logo.php');
        }
        else{
            $_SESSION['logo_err']= 'logo size must have- 2MB';
            header('location:logo.php');
        }        
    }
    else{
        $_SESSION['logo_err']= 'logo Extention must have ( jpg,  jpeg, png, gif )!';
        header('location:logo.php');
    }
}
else{
    $_SESSION['logo_err']= 'please chose a logo';
    header('location:logo.php');
}




?>