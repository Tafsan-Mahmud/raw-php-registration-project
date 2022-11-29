<?php
session_start();
require '../db.php';
require '../confirm_login_check.php';
require '../dashboard_parts/header.php';

$select = "SELECT * FROM contact";
$result_contact = mysqli_query($db_connection, $select);

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary ">
                    <h3 class="text-white">Contact list</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>SL</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Desp</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach ($result_contact as $key => $contact) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $contact['address'] ?></td>
                                <td><?= $contact['email'] ?></td>
                                <td><?= $contact['phone'] ?></td>
                                <td><?=substr($contact['desp'],0,20)?>...</td>
                                <td><a href="contact_status.php?id=<?= $contact['id'] ?>"><span class="actv-dact-btn badge text-white bg-<?= $contact['status'] == 1 ? 'success' : 'secondary' ?>"><?= $contact['status'] == 1 ? 'Active' : 'Deactive' ?></span></a></td>
                                <td><a href="delete_contact.php?id=<?= $contact['id'] ?>" class="btn-delete">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <form action="contact_post.php" method="POST">
                <div class="card pb-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Add contact</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mb-1"><strong>Address</strong></label>
                            <input type="text"  name='address' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="mb-1"><strong>Email</strong></label>
                            <input type="email"  name='email' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="mb-1"><strong>Phone</strong></label>
                            <input type="text"  name='phone' class="form-control">
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


<?php if (isset($_SESSION['contact_add'])) { ?>
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
            title: '<?= $_SESSION['contact_add'] ?>'
        })
    </script>
<?php }
unset($_SESSION['contact_add']) ?>