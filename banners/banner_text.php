<?php
session_start();
require '../db.php';
require '../confirm_login_check.php';
require '../dashboard_parts/header.php';

$select = "SELECT * FROM banner_text";
$result_banners = mysqli_query($db_connection, $select);

?>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-primary ">
                    <h3 class="text-white">Banner Item list</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>SL</th>
                            <th>Sub Title</th>
                            <th>Title</th>
                            <th>Desp</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach ($result_banners as $key => $banner) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $banner['sub_title'] ?></td>
                                <td><?= $banner['title'] ?></td>
                                <td><?=substr($banner['desp'],0,20)?>...</td>
                                <td><a href="banner_text_status.php?id=<?= $banner['id'] ?>"><span class="actv-dact-btn badge text-white bg-<?= $banner['status'] == 1 ? 'success' : 'secondary' ?>"><?= $banner['status'] == 1 ? 'Active' : 'Deactive' ?></span></a></td>
                                <td><a href="delete_banner_text.php?id=<?= $banner['id'] ?>" class="btn-delete">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <form action="banner_text_post.php" method="POST">
                <div class="card pb-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Add Banner Content</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mb-1"><strong>Sub_title</strong></label>
                            <input type="text"  name='sub_title' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="mb-1"><strong>Title</strong></label>
                            <input type="text"  name='title' class="form-control">
                        </div>
                        <div class="form-floating">
                            <label for="floatingTextarea2"><strong>Description</strong></label>
                            <textarea class="form-control" name="desp"  id="floatingTextarea2" style="height: 120px"></textarea>
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


<?php if (isset($_SESSION['banners'])) { ?>
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
            title: '<?= $_SESSION['banners'] ?>'
        })
    </script>
<?php }
unset($_SESSION['banners']) ?>