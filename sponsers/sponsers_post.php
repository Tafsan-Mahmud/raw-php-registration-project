<?php

session_start();
require '../db.php';

$uploaded_file = $_FILES['image'];
$after_explode = explode('.', $uploaded_file['name']);
$name= $uploaded_file['name'];
$extention = end($after_explode);
$exten_to_LR = strtolower($extention);
$allowed_extention = array('jpg', 'png', 'gif', 'jpeg');

if (in_array($exten_to_LR, $allowed_extention)) {
    if ($uploaded_file['size'] <= 80000000) {
        $insert = "INSERT INTO sponsers(image)VALUES('$name')";
        mysqli_query($db_connection, $insert);
        $user_id = mysqli_insert_id($db_connection);
        $file_name = $user_id . '.' . $exten_to_LR;
        $new_location = '../uploads/sponsers/'. $file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);
        $update_image = "UPDATE sponsers SET image='$file_name' WHERE id=$user_id";
        mysqli_query($db_connection, $update_image);
        $_SESSION['sponsers'] = 'Sponser Successfully added';
        header('location:sponsers.php');
    } else {
        $_SESSION['sponsers_err'] = 'image size must have 5mb';
        header('location:sponsers.php');
    }
} else {
    $_SESSION['sponsers_err'] = 'image extention must have jpg. jpeg, gif, png';
    header('location:sponsers.php');
}

?>
