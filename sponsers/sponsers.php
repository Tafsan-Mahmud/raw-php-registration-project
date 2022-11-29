<?php
session_start();
require '../db.php';
require '../confirm_login_check.php';
require '../dashboard_parts/header.php';

$select = "SELECT * FROM sponsers";
$result_sponsers = mysqli_query($db_connection, $select);

?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-success ">
                    <h3 class="text-white">Sponsers list</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>SL</th>
                            <th>image</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach ($result_sponsers as $key => $sponser) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><img width="60px" height="60px" src="../uploads/sponsers/<?= $sponser['image'] ?>" alt=""></td>
                                <td><a href="delete_sponsers.php?id=<?= $sponser['id'] ?>" class="btn-delete">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <form action="sponsers_post.php" method="POST" enctype="multipart/form-data">
                <div class="card pb-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Add Sponser</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mb-1"><strong>Image</strong></label>
                            <input type="file" name='image' class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <?php if (isset($_SESSION['sponsers_err'])) { ?>
                                <p class="text-danger"><?= $_SESSION['sponsers_err'] ?></p>
                            <?php }
                            unset($_SESSION['sponsers_err']) ?>
                            <img id="blah" width="100px" src="" alt="">
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


<?php if (isset($_SESSION['sponsers'])) { ?>
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
            title: '<?= $_SESSION['sponsers'] ?>'
        })
    </script>
<?php }
unset($_SESSION['sponsers']) ?>