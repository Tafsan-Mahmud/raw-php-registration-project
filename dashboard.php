<?php
session_start();
require 'db.php';
require 'confirm_login_check.php';
require 'dashboard_parts/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h1>Dashboard</h1>
                </div>
                <div class="card-body">
                    Welcome to dashboard
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require 'dashboard_parts/footer.php';
?>