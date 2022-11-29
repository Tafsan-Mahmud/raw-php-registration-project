<?php
session_start();
require '../db.php';
$select_users = "SELECT * FROM user";
$all_users = mysqli_query($db_connection, $select_users);

?>
<?php
require '../confirm_login_check.php';
require '../dashboard_parts/header.php';
?>

<div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto ">
                <div class="card mt-5">
                    <div class="card-header bg-primary text-white">
                        <h1 class="text-white">user list</h1>
                        <input id="trueDeletUserReq" type="hidden" value='false' name="trueDeletUserReq">
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($all_users as $key => $user) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $user['name'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><img width="60px" height="60px" src="/registration_project/uploads/users/<?= $user['image'] ?>" alt=""></td>
                                    <td><a href="delete_user.php?id=<?= $user['id'] ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php
require '../dashboard_parts/footer.php';
?>



<?php if (isset($_SESSION['isTrue'])) { ?>
    <script>
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            showConfirmButton: false,
            focusConfirm: false,
            html: '<a class="btn btn-danger"  href="confirm_delete_user.php?id=<?= $_GET['id'] ?>">Delete?</a>',
            cancelButtonColor: '#787878',

        })
    </script>


<?php }
unset($_SESSION['isTrue']) ?>
<?php if (isset($_SESSION['succes_dlt_user'])) { ?>
    <script>
        Swal.fire(
            'Good Job',
            'successfully delete the user',
            'success'
        )
    </script>


<?php }
unset($_SESSION['succes_dlt_user']) ?>

