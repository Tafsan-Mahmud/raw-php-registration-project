<?php
session_start();
require '../db.php';
require '../confirm_login_check.php';
require '../dashboard_parts/header.php';

$select = "SELECT * FROM education";
$result_education = mysqli_query($db_connection, $select);

?>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-primary ">
                    <h3 class="text-white">education list</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>SL</th>
                            <th>Year</th>
                            <th>Title</th>
                            <th>Percentage</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach ($result_education as $key => $edu) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $edu['year'] ?></td>
                                <td><?=substr($edu['title'],0,30)?>...</td>
                                <td><?=$edu['percentage']?>%</td>
                                <td><a href="education_status.php?id=<?= $edu['id'] ?>"><span class="actv-dact-btn badge text-white bg-<?= $edu['status'] == 1 ? 'success' : 'secondary' ?>"><?= $edu['status'] == 1 ? 'Active' : 'Deactive' ?></span></a></td>
                                <td><a href="delete_education.php?id=<?= $edu['id'] ?>" class="btn-delete">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <form action="education_post.php" method="POST">
                <div class="card pb-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Education</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mb-1"><strong>Year</strong></label>
                            <input type="text"  name='year' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="mb-1"><strong>Title</strong></label>
                            <input type="text"  name='title' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="mb-1"><strong>Percentage (enter number only)</strong></label>
                            <input type="number"  name='percentage' class="form-control">
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


<?php if (isset($_SESSION['edu_add'])) { ?>
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
            title: '<?= $_SESSION['edu_add'] ?>'
        })
    </script>
<?php }
unset($_SESSION['edu_add']) ?>
<?php if(isset($_SESSION['edu_err_status'])){ ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['edu_err_status']?>',
    })
</script>

<?php } unset($_SESSION['edu_err_status'])?>