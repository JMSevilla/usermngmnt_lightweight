<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
<!--    Data Tables-->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/styleloader.css" >
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper"> 
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="admincontent/admin_dashboard.php" class="nav-link">Home</a>
            </li>

        </ul>

        <!-- SEARCH FORM -->


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto" >
            <!-- Messages Dropdown Menu -->
            <!-- Notifications Dropdown Menu -->

            <li class="nav-item dropdown">

                <a class="nav-link" data-toggle="dropdown" href="#">

                <?php echo $_SESSION["fname"] . $_SESSION["lname"]; ?>

                    <span class="badge badge-warning navbar-badge" style="margin-top: -7px;">Hi! <?php echo $_SESSION["fname"] . $_SESSION["lname"]; ?></span>
                </a>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                    <span class="dropdown-header">Hello! <?php echo $_SESSION["fname"] . $_SESSION["lname"]; ?></span>

                    <a href="logout.php" class="dropdown-item">
                        <i class="fas fa-align-left mr-2"></i> Sign out

                    </a>
                    <!-- <a href="profile" class="dropdown-item">
                        <img class="img-fluid" src="profileImage/<?php echo $row['image']; ?>" alt="Avatar" style="width: 10%; border-radius: 60%; height: auto;"  />
                         Profile <span class="right badge badge-warning">feature work</span>

                    </a> -->

                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>

            
            <li class="nav-item">

            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="admin_dashboard.php" class="brand-link">
       
            <img src="https://scontent.fmnl16-1.fna.fbcdn.net/v/t1.0-9/95665643_103345161371710_3068525030846496768_n.png?_nc_cat=108&ccb=1-3&_nc_sid=09cbfe&_nc_eui2=AeFTLcxkQKv7-_trhw27-8GEBDZhfqOv560ENmF-o6_nre4uzF4sUt4JNomao8chWkGEafX0aKe3dC6vA8Sxr2ki&_nc_ohc=hMLJsq3FmjwAX_6wfzq&_nc_ht=scontent.fmnl16-1.fna&oh=6798fd85c580a5f187f589cfb3b7affb&oe=6074DF0D" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; margin-top: 20px;">
            <span class="brand-text font-weight-light"></span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
<!--                <div class="image">-->
<!--                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
<!--                </div>-->
                <div class="info">

                    <a href="profile" class="d-block"></a>

                   
                </div>
            </div>

            <!-- SidebarSearch Form -->


            <!-- Sidebar Menu -->
           <?php include("../libraries/resources/admin/sidenav.php"); ?>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>