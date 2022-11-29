<?php

session_start();
require '../db.php';

$category = $_POST['category'];
$sub_title = $_POST['sub_title'];
$title = $_POST['title'];
$desp = $_POST['desp'];
$author_id = $_SESSION['ID'];
$uploaded_file = $_FILES['image'];
$after_explode = explode('.', $uploaded_file['name']);
$extention = end($after_explode);
$exten_to_LR = strtolower($extention);
$allowed_extention = array('jpg', 'png', 'gif', 'jpeg');

if (in_array($exten_to_LR, $allowed_extention)) {
    if ($uploaded_file['size'] <= 80000000) {
        $insert = "INSERT INTO works(category, sub_title, title, desp, author_id)VALUES('$category','$sub_title', '$title', '$desp', '$author_id')";
        mysqli_query($db_connection, $insert);
        $work_id = mysqli_insert_id($db_connection);
        $file_name = $work_id.'.'.$exten_to_LR;
        $new_location = '../uploads/work/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);
        $update_image = "UPDATE works SET image='$file_name' WHERE id=$work_id";
        mysqli_query($db_connection, $update_image);
        $_SESSION['work'] = 'Work Successfully added';
        header('location:work.php');
    } else {
        $_SESSION['work_err'] = 'image size must have 5mb';
        header('location:work.php');
    }
} else {
    $_SESSION['work_err'] = 'image extention must have jpg. jpeg, gif, png';
    header('location:work.php');
}

?>
