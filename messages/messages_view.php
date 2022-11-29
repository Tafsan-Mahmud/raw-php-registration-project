<?php
session_start();
require '../db.php';
require '../confirm_login_check.php';
require '../dashboard_parts/header.php';
$id = $_GET['id'];
$update_view = "UPDATE messages set status=1 WHERE id=$id";
mysqli_query($db_connection, $update_view);


$select = "SELECT * FROM messages WHERE id=$id";
$result_messages = mysqli_query($db_connection, $select);
$after_assos_msg = mysqli_fetch_assoc($result_messages);

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-success ">
                    <h3 class="text-white">View Message</h3>
                </div>
                <div class="card-body">
                    <div class="message">
                        <div class="d-flex">
                            <h4 class="mr-2"><strong>Name : </strong></h4>
                            <h4> <?= $after_assos_msg['name'] ?></h4>
                        </div>
                        <div class="d-flex">
                            <h4 class="mr-2"> <strong>Email : </strong></h4>
                            <h5> <?= $after_assos_msg['email'] ?></h5>
                        </div>
                        <h4><strong>Message:</strong></h4>
                        <p><?= $after_assos_msg['message'] ?></p>
                    </div>
                    <a href="messages.php" class="btn btn-success">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require '../dashboard_parts/footer.php';
?>