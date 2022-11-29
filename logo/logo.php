<?php
session_start();
require '../db.php';
require '../confirm_login_check.php';
require '../dashboard_parts/header.php';

$select = "SELECT * FROM logos";
$result_logo = mysqli_query($db_connection, $select);

?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div  class="card">
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

                        <?php foreach ($result_logo as $key => $logos) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><img width="60px" height="60px" src="/registration_project/uploads/logos/<?= $logos['logo'] ?>" alt=""></td>
                                <td><a  href="logo_status.php?id=<?=$logos['id']?>"><span class="actv-dact-btn badge text-white bg-<?= $logos['status'] == 1 ?'success':'secondary'?>"><?= $logos['status'] == 1 ?'Active':'Deactive'?></span></a></td>
                                <td><a href="delete_logo.php?id=<?=$logos['id']?>" class="btn-delete">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <form action="logo_post.php" method="POST" enctype="multipart/form-data">
                <div class="card pb-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Upload Logo</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mb-1"><strong>Logo</strong></label>
                            <input type="file" name='logo' class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <?php if (isset($_SESSION['logo_err'])) { ?>
                                <p class="text-danger"><?= $_SESSION['logo_err'] ?></p>
                            <?php }
                            unset($_SESSION['logo_err']) ?>
                            <img width="100" src="" id="blah" alt="">
                        </div>
                    </div>
                    <div class="text-center pt-3">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require '../dashboard_parts/footer.php';
?>


<?php if (isset($_SESSION['logo_added'])) { ?>
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
            title: '<?= $_SESSION['logo_added'] ?>'
        })
    </script>
<?php } unset($_SESSION['logo_added']) ?>