
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url("assets/adhyay/img/favicon.png") ?>">
    <title>Adhyay</title>

  <?= link_tag('assets/font/css/font-awesome.min.css'); ?>
<?= link_tag('assets/adhyay/css/bootstrap.min.css'); ?>
<?= link_tag('assets/adhyay/css/index.css'); ?>

<?= link_tag('assets/adhyay/css/font-awesome.min.css/');?>
<?= link_tag('assets/adhyay/plugins/light-gallery/css/lightgallery.min.css'); ?>
<?= link_tag('assets/adhyay/css/fullcalendar.min.css'); ?>
<?= link_tag('assets/adhyay/css/dataTables.bootstrap4.min.css'); ?>
<?= link_tag('assets/adhyay/css/select2.min.css'); ?>
<?= link_tag('assets/adhyay/css/bootstrap-datetimepicker.min.css'); ?>
<?= link_tag('assets/adhyay/plugins/morris/morris.css'); ?>
<?= link_tag('assets/adhyay/css/style.css'); ?>
<link rel="stylesheet" type="text/css" media="print" href="<?= base_url("assets/adhyay/css/print.css");?>">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://use.fontawesome.com/b4079604d3.js"></script>

</head>
<body>


    <div class="main-wrapper">
        <div class="header">
            <!-- Header start -->
            <div class="header-left">
                <a href="<?= base_url('index.php/DashboardC') ?>" class="logo">
                    <img  src="<?= base_url("assets/adhyay/img/AY_black.png"); ?>" alt="">
                    <!-- <span class="text-uppercase">Preschool</span> -->
                </a>
            </div>
            <div class="page-title-box float-left">
                <h3 class="text-uppercase">Preschool</h3>
            </div>

            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars text-primary" aria-hidden="true"></i></a>
            <ul class="nav user-menu float-right">

                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                      <?php
                if(!empty($_SESSION['student_profile_image'])){
                  $userImage = "../employee/upload/$_SESSION[student_profile_image]";
                }else{
                      $userImage =  base_url("assets/adhyay/img/user.jpg");
                }
                     ?>
                        <span class="user-img"><img class="rounded-circle" src="<?php echo $userImage; ?>" width="40" height="40" >
                            <span class="status online"></span></span>
                        <span><?php //echo $_SESSION['stu_name']; ?></span>
                    </a>

                    <div class="dropdown-menu">
                              <!-- <a class="dropdown-item" href="my_profile.php">My Profile</a> -->
                            <a class="dropdown-item" href="<?= base_url("index.php/LoginC/Logout");  ?>"><i class="fa fa-sign-out text-danger" aria-hidden="true"></i> Logout</a>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <!-- mobile menu -->
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="my_profile.php">My Profile</a>
                        <a class="dropdown-item" href="Adhyay/logout.php">Logout</a>

                </div>
            </div>
        </div>
