<?php
session_start();
require '../db.php';
require '../confirm_login_check.php';
require '../dashboard_parts/header.php';

$select = "SELECT * FROM reviews";
$result_review = mysqli_query($db_connection, $select);

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-success ">
                    <h3 class="text-white">Review list</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Comment</th>
                            <th>image</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach ($result_review as $key => $review) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $review['name'] ?></td>
                                <td><?= $review['title'] ?></td>
                                <td><?=substr($review['comment'],0,20)?>...</td>
                                <td><img width="60px" height="60px" src="../uploads/reviews/<?= $review['image'] ?>" alt=""></td>
                                <td><a href="delete_review.php?id=<?= $review['id'] ?>" class="btn-delete">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <form action="review_post.php" method="POST" enctype="multipart/form-data">
                <div class="card pb-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Add Banner Content</h3>
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                            <label class="mb-1"><strong>Name</strong></label>
                            <input type="text"  name='name' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="mb-1"><strong>Title</strong></label>
                            <input type="text"  name='title' class="form-control">
                        </div>
                        
                        <div class="form-floating">
                            <label for="floatingTextarea2"><strong>Comment</strong></label>
                            <textarea class="form-control" name="comment"  id="floatingTextarea2" style="height: 120px"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="mb-1"><strong>Image</strong></label>
                            <input type="file" name='image' class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <?php if (isset($_SESSION['review_err'])) { ?>
                                <p class="text-danger"><?= $_SESSION['review_err'] ?></p>
                            <?php }
                            unset($_SESSION['review_err']) ?>
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


<?php if (isset($_SESSION['review'])) { ?>
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
            title: '<?= $_SESSION['review'] ?>'
        })
    </script>
<?php }
unset($_SESSION['review']) ?>