<?php
session_start();
require '../db.php';

    $id = $_GET['id'];
    $select = "SELECT * FROM services WHERE id=$id";
    $result = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($result);


    $finding= "SELECT COUNT(*) as active FROM services WHERE status=1";
    $actv_res = mysqli_query($db_connection, $finding);
    $actv_after_assoc = mysqli_fetch_assoc($actv_res);
   


    if ($after_assoc['status'] == 0) {
        if($actv_after_assoc['active'] < 6){

            $sts_update = "UPDATE services SET status=1 WHERE id=$id";
            mysqli_query($db_connection, $sts_update);
            $_SESSION['service'] = 'Successfully Change icon Status';
            header('location:services.php');
        }
        else{
            $_SESSION['service_status_err'] = 'maximum 5 services can be active';
            header('location:services.php');  
        }
    } 
    else {
        if($actv_after_assoc['active'] > 3 ){
            $sts_update = "UPDATE services SET status=0 WHERE id=$id";
            mysqli_query($db_connection, $sts_update);
            $_SESSION['service'] = 'Successfully Change icon Status';
            header('location:services.php');
        }
        else{
            $_SESSION['service_status_err'] = 'minimum 4 services have to active';
            header('location:services.php');
        }
    }
?>
