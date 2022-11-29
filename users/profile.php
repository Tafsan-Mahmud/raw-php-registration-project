<?php
session_start();
require '../db.php';
require '../confirm_login_check.php';
require '../dashboard_parts/header.php';


$id =  $_SESSION['ID'];
$user = "SELECT * FROM user WHERE id=$id ";
$result = mysqli_query($db_connection, $user);
$after_assoc_user_data = mysqli_fetch_assoc($result);

?>



<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <form action="profile_info_update.php" method="POST">
                <div class="card pb-4">
                    <div class="card-header">
                        <h3>update Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mb-1"><strong>Name</strong></label>
                            <input type="text" name='name' class="form-control" value="<?= $after_assoc_user_data['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="mb-1"><strong>Old Password</strong></label>
                            <input type="password" name='old_password' class="form-control" value="">
                            <?php if (isset($_SESSION['old_pass_wrong'])) { ?>
                                <p class="text-danger"><?= $_SESSION['old_pass_wrong'] ?></p>
                            <?php } unset($_SESSION['old_pass_wrong']) ?>
                        </div>
                        <div class="form-group">
                            <label class="mb-1"><strong>Password</strong></label>
                            <input type="password" name='password' class="form-control" value="">
                        </div>
                    </div>
                    <div class="text-center pt-3">
                        <button type="submit" class="btn btn-primary">update</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <form action="profile_image_update.php" method="POST" enctype="multipart/form-data">
                <div class="card pb-4">
                    <div class="card-header">
                        <h3>update Profile image</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mb-1"><strong>Image</strong></label>
                            <input type="file" name='image' class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <?php if (isset($_SESSION['image_err'])) { ?>
                                <p class="text-danger"><?= $_SESSION['image_err'] ?></p>
                            <?php }
                            unset($_SESSION['image_err']) ?>
                            <img id="blah" width="100px" height="100px" src="/registration_project/uploads/users/<?= $after_assoc_user_data['image'] ?>" alt="">
                        </div>
                    </div>
                    <div class="text-center pt-3">
                        <button type="submit" class="btn btn-primary">update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<?php
require '../dashboard_parts/footer.php';

?>


<?php if (isset($_SESSION['update_profile'])){ ?>
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
            title: '<?= $_SESSION['update_profile'] ?>'
        })
    </script>
<?php } unset($_SESSION['update_profile']) ?>




