<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <style>
        .show-pass-btn {
            position: relative;
        }

        .positioning-eye {
            position: absolute;
            bottom: 10px;
            right: 10px;
            cursor: pointer;
            z-index: 5;
        }
        .login-link{
            text-decoration: none !important;
            color: red;
            letter-spacing: .6px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div style="font-weight: 700; letter-spacing:1px;" class="card-header bg-primary text-white">Regestration Form</div>
                    <div class="card-body">
                        <form action="reg.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Name</label>
                                <input type="text" value="<?= (isset($_SESSION['name_value'])) ? $_SESSION['name_value'] : '' ?>" name="name" class="form-control" id="exampleInputName">
                                <?php if (isset($_SESSION['name_err'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['name_err'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" value="<?= (isset($_SESSION['email_value'])) ? $_SESSION['email_value'] : '' ?>" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <?php if (isset($_SESSION['email_err'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['email_err'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="mb-3 show-pass-btn">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <i id="eye" class="fa fa-eye positioning-eye"></i>
                                <input id="show" type="password" value="<?= (isset($_SESSION['pass_value'])) ? $_SESSION['pass_value'] : '' ?>" name='password' class="form-control show-pass-btn" id="exampleInputPassword1">
                                <?php if (isset($_SESSION['pass_err'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['pass_err'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="mb-3 pass_field">
                                <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                <?php if (isset($_SESSION['invalid_img'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['invalid_img'] ?></p>
                                <?php }
                                unset($_SESSION['invalid_img']) ?>
                                <div class="my-2">
                                    <img width="100" src="" id="blah" alt="">
                                </div>
                            </div>
                            <p>if you have already an account please ! <a class="login-link" href="login.php">Loging</a></p>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const show = document.getElementById('show')
        const eye = document.getElementById('eye').addEventListener('click', () => {
            if (show.type == 'password') {
                show.type = 'text';
            } else if (show.type == 'text') {
                show.type = 'password';
            }
        })
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
<?php if (isset($_SESSION['success'])) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-start',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '<?= $_SESSION['success'] ?>'
        })
    </script>

<?php } unset($_SESSION['success']) ?>

<?php

unset($_SESSION['name_err']);
unset($_SESSION['email_err']);
unset($_SESSION['pass_err']);
unset($_SESSION['name_value']);
unset($_SESSION['email_value']);
unset($_SESSION['pass_value']);
unset($_SESSION['success']);

?>