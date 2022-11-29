<?php
session_start();
require '../db.php';

    $id = $_GET['id'];
    $select = "SELECT * FROM social WHERE id=$id";
    $result = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($result);
    $finding= "SELECT COUNT(*) as active FROM social WHERE status=1";
    $actv_res = mysqli_query($db_connection, $finding);
    $actv_after_assoc = mysqli_fetch_assoc($actv_res);
    if ($after_assoc['status'] == 0) {
        if($actv_after_assoc['active'] < 4){
            $sts_update = "UPDATE social SET status=1 WHERE id=$id";
            mysqli_query($db_connection, $sts_update);
            $_SESSION['social'] = 'Successfully Change icon Status';
            header('location:social.php');
        }
        else{
            $_SESSION['status_err'] = 'maximum 4 icon can be active';
            header('location:social.php');  
        }
    } 
    else {
        if($actv_after_assoc['active'] > 3 ){
            $sts_update = "UPDATE social SET status=0 WHERE id=$id";
            mysqli_query($db_connection, $sts_update);
            $_SESSION['social'] = 'Successfully Change icon Status';
            header('location:social.php');
        }
        else{
            $_SESSION['status_err'] = 'minimum 3 icon have to active';
            header('location:social.php');
        }
    }
?>
