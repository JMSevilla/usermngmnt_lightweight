<?php 
include("../sessions/adminsession.php");
?>

<?php 
include("../libraries/resources/admin/navbar.php");
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add User</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <?php include("../views/admin/dashboard_adduser.php"); ?>
        </div>
    </div>
</div>

<?php 
include("../libraries/resources/admin/scripts.php");
?>
