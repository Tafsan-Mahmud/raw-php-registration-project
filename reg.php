<?php
require 'db.php';
session_start();


$state = true;
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$pass_hass = password_hash($password, PASSWORD_DEFAULT);
$upld_fil = $_FILES['image'];
$uper = preg_match('@[A-Z]@', $password);
$lower = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$specialChar = preg_match('@[!,#,$,%,^,&,*,]@', $password);
$after_explod = explode('.', $upld_fil['name']);
$extension = end($after_explod);
$extnTolwr = strtolower($extension);
$allowed_extension = array('jpg', 'png', 'gif', 'jpeg');



if (empty($name)) {
    $state = false;
    $_SESSION['name_err'] = 'please enter your name';
}

if (empty($email)) {
    $state = false;
    $_SESSION['email_err'] = 'please enter your email';
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $state = false;
        $_SESSION['email_err'] = 'please enter valid email';
    }
}

if (empty($password)) {
    $state = false;
    $_SESSION['pass_err'] = 'please enter your pasword';
} else {
    if ($uper) {
        if ($lower) {
            if ($number) {
                if ($specialChar) {
                    if (strlen($password) >= 8) {
                    } else {
                        $state = false;
                        $_SESSION['pass_err'] = 'pasword must have 8 digite';
                    }
                } else {
                    $state = false;
                    $_SESSION['pass_err'] = 'pasword must have 1 special character';
                }
            } else {
                $state = false;
                $_SESSION['pass_err'] = 'pasword must have 1 number';
            }
        } else {
            $state = false;
            $_SESSION['pass_err'] = 'pasword must have 1 lowercase';
        }
    } else {
        $state = false;
        $_SESSION['pass_err'] = 'pasword must have 1 upercase';
    }
}



if ($state) {


    $select = "SELECT COUNT(*) as exist FROM user WHERE email='$email'";
    $result = mysqli_query($db_connection, $select);
    $after_assoc_eml = mysqli_fetch_assoc($result);
    if ($after_assoc_eml['exist'] == 0) {
        echo $after_assoc_eml['exist'] . 'if';
        if (in_array($extnTolwr, $allowed_extension)) {
            if ($upld_fil['size'] <= 9800000) {
                $insert = "INSERT INTO user(name, email, password)VALUES('$name', '$email', '$pass_hass')";
                mysqli_query($db_connection, $insert);
                $user_id = mysqli_insert_id($db_connection);
                $file_name = $user_id . '.' . $extnTolwr;
                $new_location = 'uploads/users/' . $file_name;
                move_uploaded_file($upld_fil['tmp_name'], $new_location);
                $update = "UPDATE user SET image='$file_name' WHERE id=$user_id";
                mysqli_query($db_connection, $update);
                // $_SESSION['login_confirm'] = "congratullation record saved";
                $_SESSION['login_confirm'] = "dashboard access allow";
                header('location:login.php');
            } else {
                $_SESSION['name_value'] = $name;
                $_SESSION['email_value'] = $email;
                $_SESSION['pass_value'] = $password;
                $_SESSION['invalid_img'] = 'image size to large';
                header('location:index.php');
            }
        } else {
            $_SESSION['name_value'] = $name;
            $_SESSION['email_value'] = $email;
            $_SESSION['pass_value'] = $password;
            if (empty($upld_fil['name'])) {
                $_SESSION['invalid_img'] = 'please chose a image';
            } else {
                $_SESSION['invalid_img'] = 'you can upload only "jpg", "jpeg", "png", "gif" ';
            }
            header('location:index.php');
        }
    } else {
        $_SESSION['name_value'] = $name;
        $_SESSION['email_value'] = $email;
        $_SESSION['pass_value'] = $password;
        $_SESSION['email_err'] = 'This Email Already Exist!';
        header('location:index.php');
    }
} else {
    $_SESSION['name_value'] = $name;
    $_SESSION['email_value'] = $email;
    $_SESSION['pass_value'] = $password;
    header('location:index.php');
}
?>