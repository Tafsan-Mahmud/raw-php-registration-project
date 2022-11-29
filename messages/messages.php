<?php
session_start();
require '../db.php';
require '../confirm_login_check.php';
require '../dashboard_parts/header.php';

$select = "SELECT * FROM messages";
$result_messages = mysqli_query($db_connection, $select);

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-success ">
                    <h3 class="text-white">Message list</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr class="bg-tbl-header-msg">
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach ($result_messages as $key => $message) { ?>
                            <tr class="<?= $message['status'] == 0 ? 'tbl-bg-true' : '' ?>">
                                <td><?= $key + 1 ?></td>
                                <td><?= $message['name'] ?></td>
                                <td><?= $message['email'] ?></td>
                                <td><?=substr($message['message'],0,20)?>...</td>
                                <td><a href="messages_view.php?id=<?= $message['id'] ?>" class="btn-view<?= $message['status'] == 1 ? '-true' : '' ?>">View</a><a href="delete_messages.php?id=<?= $message['id'] ?>" class="btn-delete">Delete</a></td>
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


<?php if (isset($_SESSION['message'])) { ?>
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
            title: '<?= $_SESSION['message'] ?>'
        })
    </script>
<?php }
unset($_SESSION['message']) ?>