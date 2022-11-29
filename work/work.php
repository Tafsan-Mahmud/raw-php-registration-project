<?php
session_start();
require '../db.php';
require '../confirm_login_check.php';
require '../dashboard_parts/header.php';

$select = "SELECT * FROM works";
$result_works = mysqli_query($db_connection, $select);

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-success ">
                    <h3 class="text-white">Work list</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>SL</th>
                            <th>Category</th>
                            <th>Sub_Title</th>
                            <th>Title</th>
                            <th>Desp</th>
                            <th>image</th>
                            <th>Author_id</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach ($result_works as $key => $work) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $work['category'] ?></td>
                                <td><?= $work['sub_title'] ?></td>
                                <td><?= $work['title'] ?></td>
                                <td><?=substr($work['desp'],0,20)?>...</td>
                                <td><img width="60px" height="60px" src="../uploads/work/<?= $work['image'] ?>" alt=""></td>
                                <td><?= $work['author_id'] ?></td>
                                <td><a href="delete_work.php?id=<?= $work['id'] ?>" class="btn-delete">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <form action="work_post.php" method="POST" enctype="multipart/form-data">
                <div class="card pb-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Add Work</h3>
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                            <label class="mb-1"><strong>Category</strong></label>
                            <input type="text"  name='category' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="mb-1"><strong>Sub_Title</strong></label>
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
                        <div class="form-group">
                            <label class="mb-1"><strong>Image</strong></label>
                            <input type="file" name='image' class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <?php if (isset($_SESSION['work_err'])) { ?>
                                <p class="text-danger"><?= $_SESSION['work_err'] ?></p>
                            <?php }
                            unset($_SESSION['work_err']) ?>
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


<?php if (isset($_SESSION['work'])) { ?>
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
            title: '<?= $_SESSION['work'] ?>'
        })
    </script>
<?php }
unset($_SESSION['work']) ?>