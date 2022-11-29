<?php

session_start();
require '../db.php';

$name = $_POST['name'];
$title = $_POST['title'];
$comment = $_POST['comment'];
$uploaded_file = $_FILES['image'];
$after_explode = explode('.', $uploaded_file['name']);
$extention = end($after_explode);
$exten_to_LR = strtolower($extention);
$allowed_extention = array('jpg', 'png', 'gif', 'jpeg');

if (in_array($exten_to_LR, $allowed_extention)) {
    if ($uploaded_file['size'] <= 80000000) {
        $insert = "INSERT INTO reviews(name, title, comment)VALUES('$name', '$title', '$comment')";
        mysqli_query($db_connection, $insert);
        $user_id = mysqli_insert_id($db_connection);
        $file_name = $user_id . '.' . $exten_to_LR;
        $new_location = '../uploads/reviews/'. $file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);
        $update_image = "UPDATE reviews SET image='$file_name' WHERE id=$user_id";
        mysqli_query($db_connection, $update_image);
        $_SESSION['review'] = 'review Successfully added';
        header('location:review.php');
    } else {
        $_SESSION['review_err'] = 'image size must have 5mb';
        header('location:review.php');
    }
} else {
    $_SESSION['review_err'] = 'image extention must have jpg. jpeg, gif, png';
    header('location:review.php');
}

?>
