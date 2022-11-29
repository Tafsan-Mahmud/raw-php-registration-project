<?php
session_start();
require '../db.php';
require '../confirm_login_check.php';
require '../dashboard_parts/header.php';

$select = "SELECT * FROM about_me";
$result_about_me = mysqli_query($db_connection, $select);

?>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-primary ">
                    <h3 class="text-white">About list</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>SL</th>
                            <th>About Me</th>
                            <th>Desp</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach ($result_about_me as $key => $about) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $about['about_me'] ?></td>
                                <td><?=substr($about['desp'],0,20)?>...</td>
                                <td><a href="about_me_status.php?id=<?= $about['id'] ?>"><span class="actv-dact-btn badge text-white bg-<?= $about['status'] == 1 ? 'success' : 'secondary' ?>"><?= $about['status'] == 1 ? 'Active' : 'Deactive' ?></span></a></td>
                                <td><a href="delete_about_me.php?id=<?= $about['id'] ?>" class="btn-delete">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <form action="about_me_post.php" method="POST">
                <div class="card pb-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Add About</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mb-1"><strong>About What?!</strong></label>
                            <input type="text"  name='about' class="form-control">
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


<?php if (isset($_SESSION['about_add'])) { ?>
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
            title: '<?= $_SESSION['about_add'] ?>'
        })
    </script>
<?php }
unset($_SESSION['about_add']) ?>