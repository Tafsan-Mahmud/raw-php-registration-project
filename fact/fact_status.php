<?php
session_start();
require '../db.php';

    $id = $_GET['id'];
    $select = "SELECT * FROM fact WHERE id=$id";
    $result = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($result);


    $finding= "SELECT COUNT(*) as active FROM fact WHERE status=1";
    $actv_res = mysqli_query($db_connection, $finding);
    $actv_after_assoc = mysqli_fetch_assoc($actv_res);


    if ($after_assoc['status'] == 0) {
        if($actv_after_assoc['active'] < 6){

            $sts_update = "UPDATE fact SET status=1 WHERE id=$id";
            mysqli_query($db_connection, $sts_update);
            $_SESSION['fact'] = 'Successfully Change icon Status';
            header('location:fact.php');
        }
        else{
            $_SESSION['fact_status_err'] = 'maximum 5 Fact can be active';
            header('location:fact.php');  
        }
    } 
    else {
        if($actv_after_assoc['active'] > 4 ){
            $sts_update = "UPDATE fact SET status=0 WHERE id=$id";
            mysqli_query($db_connection, $sts_update);
            $_SESSION['fact'] = 'Successfully Change icon Status';
            header('location:fact.php');
        }
        else{
            $_SESSION['fact_status_err'] = 'minimum 4 fact have to active';
            header('location:fact.php');
        }
    }
?>
