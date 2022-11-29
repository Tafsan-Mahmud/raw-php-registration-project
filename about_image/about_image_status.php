<?php
session_start();
require '../db.php';

$id= $_GET['id'];
$select = "SELECT * FROM about_image WHERE id=$id";
$result_status = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($result_status);



$select1 = "SELECT COUNT(*) as len1 FROM about_image WHERE status=1" ;
$result_about_img1 = mysqli_query($db_connection, $select1);
$after_assoc_len1 = mysqli_fetch_assoc($result_about_img1);


$select2 = "SELECT COUNT(*) as len2 FROM about_image WHERE status=0" ;
$result_about_img2 = mysqli_query($db_connection, $select2);
$after_assoc_len2 = mysqli_fetch_assoc($result_about_img2);

$lenght = $after_assoc_len1['len1'] + $after_assoc_len2['len2'];


// echo $after_assoc_len1['len1'].'<br>';
echo $lenght;


// die();
if($lenght == 1){
    $_SESSION['err_status'] = 'when here is single image then you can`t change status';
    header('location:about_image.php');
}
else{
    
    if($after_assoc['status'] == 0){
        $all_sts_update = "UPDATE about_image SET status=0";
        mysqli_query($db_connection,$all_sts_update);
        $sts_update = "UPDATE about_image SET status=1 WHERE id=$id";
        mysqli_query($db_connection,$sts_update);
        $_SESSION['abt_img_added']= 'Successfully Change image Status';
        header('location:about_image.php');
    }
    else{
        $_SESSION['err_status'] = 'status already active';
        header('location:about_image.php');
    }
    
}


// when here is single image then you can't change status
?>