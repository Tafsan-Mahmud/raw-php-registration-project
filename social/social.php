<?php
session_start();
require '../db.php';
require '../confirm_login_check.php';
require '../dashboard_parts/header.php';

$select = "SELECT * FROM social";
$result_social = mysqli_query($db_connection, $select);

$fonts = array(
    'fa-apple',
    'fa-facebook',
    'fa-twitch',
    'fa-twitter',
    'fa-twitter-square',
    'fa-instagram',
    'fa-pinterest',
    'fa-pinterest-p',
    'fa-pinterest-square',
    'fa-linkedin',
    'fa-linkedin-square',
    'fa-youtube',
    'fa-youtube-play',
    'fa-youtube-square',
);




?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary ">
                    <h3 class="text-white">Social icon List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>SL</th>
                            <th>icon</th>
                            <th>link</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach ($result_social as $key => $icon) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><i style="font-family:fontawesome; font-size:30px;" class="<?= $icon['icon'] ?>"></i></td>
                                <td><?= $icon['link'] ?></td>
                                <td><a href="social_status.php?id=<?= $icon['id'] ?>"><span class="actv-dact-btn badge text-white bg-<?= $icon['status'] == 1 ? 'success' : 'secondary' ?>"><?= $icon['status'] == 1 ? 'Active' : 'Deactive' ?></span></a></td>
                                <td><a href="delete_social.php?id=<?= $icon['id'] ?>" class="btn-delete">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-10">
            <form action="social_post.php" method="POST">
                <div class="card pb-4">
                    <div class="card-header ">
                        <h3>Add icon</h3>
                    </div>
                    <div class="card-body">
                        <?php foreach ($fonts as $icons) { ?>
                            <i data-icon="<?= $icons ?>" style="font-family:fontawesome; margin-right:10px; font-size:30px; cursor: pointer;" class="<?= $icons ?> target-icon"></i>
                        <?php } ?>
                    </div>
                    <div class="mb-3 m-3">
                        <input type="hidden" name='icon' id="icon-field" class="form-control">
                    </div>
                    <div class="m-3">
                        <label class="mr-2" for="">you select -></label>
                        <i style="font-family:fontawesome; margin-right:10px; font-size:30px; cursor: pointer;" id="icon-show"></i>
                    </div>
                    <?php if (isset($_SESSION['social_err'])) { ?>
                        <p class="text-danger ml-3"><?= $_SESSION['social_err'] ?></p>
                    <?php }
                    unset($_SESSION['social_err']) ?>
                    <div class="mb-3 m-3">
                        <label for="exampleInputPassword1" class="form-label">Provide icons Link</label>
                        <input type="text" name='link' class="form-control">
                    </div>
                    <?php if (isset($_SESSION['social_err_link'])) { ?>
                        <p class="text-danger ml-3"><?= $_SESSION['social_err_link'] ?></p>
                    <?php }
                    unset($_SESSION['social_err_link']) ?>
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
<?php ?>
<script>
    $('.target-icon').click(function(e) {
        var icon = $(this).attr('data-icon');
        $('#icon-field').attr('value', icon);
        var classes = $('#icon-show').attr('class');
        $('#icon-show').removeClass(classes);
        $('#icon-show').addClass(icon);
    })
</script>
<?php ?>

<?php if (isset($_SESSION['social'])) { ?>
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
            title: '<?= $_SESSION['social'] ?>'
        })
    </script>
<?php }
unset($_SESSION['social']) ?>


<?php if (isset($_SESSION['status_err'])) { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?=$_SESSION['status_err']?>!',
        })
    </script>
<?php }
unset($_SESSION['status_err']) ?>