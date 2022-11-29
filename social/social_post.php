<?php

session_start();
require '../db.php';

$icon = $_POST["icon"];
$link = $_POST["link"];

if (!empty($icon)) {
    if (!empty($link)) {
        $insert = "INSERT INTO social(icon,link)VALUES('$icon', '$link')";
        mysqli_query($db_connection, $insert);
        $_SESSION['social'] = 'icon successfully added';
        header('location:social.php');
    } else {
        $_SESSION['social_err_link'] = 'please Provide icons link';
        header('location:social.php');
    }
} else {
    $_SESSION['social_err'] = 'please chose a icon';
    header('location:social.php');
}
?>