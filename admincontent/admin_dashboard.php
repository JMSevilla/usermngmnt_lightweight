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
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <?php include("../views/admin/dashboard_index.php"); ?>
        </div>
    </div>
</div>

<?php 
include("../libraries/resources/admin/scripts.php");
?>
