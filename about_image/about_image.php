<?php
session_start();
require '../db.php';
require '../confirm_login_check.php';
require '../dashboard_parts/header.php';

$select = "SELECT * FROM about_image";
$result_about_img = mysqli_query($db_connection, $select);

?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-primary ">
                    <h3 class="text-white">Logo List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>SL</th>
                            <th>Logo</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach ($result_about_img as $key => $abt_img) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><img width="60px" height="60px" src="/registration_project/uploads/about/<?= $abt_img['image'] ?>" alt=""></td>
                                <td><a href="about_image_status.php?id=<?= $abt_img['id'] ?>"><span class="actv-dact-btn badge text-white bg-<?= $abt_img['status'] == 1 ? 'success' : 'secondary' ?>"><?= $abt_img['status'] == 1 ? 'Active' : 'Deactive' ?></span></a></td>
                                <td><a href="delete_about_image.php?id=<?= $abt_img['id'] ?>" class="btn-delete">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <form action="about_image_post.php" method="POST" enctype="multipart/form-data">
                <div class="card pb-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Upload About Image</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mb-1"><strong>image</strong></label>
                            <input type="file" name='image' class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <?php if (isset($_SESSION['abt_img_err'])) { ?>
                                <p class="text-danger"><?= $_SESSION['abt_img_err'] ?></p>
                            <?php }
                            unset($_SESSION['abt_img_err']) ?>
                            <img width="100" src="" id="blah" alt="">
                        </div>
                    </div>
                    <div class="text-center pt-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require '../dashboard_parts/footer.php';
?>


<?php if (isset($_SESSION['abt_img_added'])) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-start',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '<?= $_SESSION['abt_img_added'] ?>'
        })
    </script>
<?php }
unset($_SESSION['abt_img_added']) ?>

<?php if(isset($_SESSION['err_status'])){ ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['err_status']?>',
    })
</script>

<?php } unset($_SESSION['err_status'])?>