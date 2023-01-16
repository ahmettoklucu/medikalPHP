<!DOCTYPE html>
<html lang="tr">

<!-- Mirrored from coderthemes.com/adminto/layouts/layouts-horizontal.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 May 2022 10:16:40 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Horizontal Layout | Adminto - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?=admin_public_url('/images/favicon.ico')?>">

    <!-- App css -->

    <link href="<?=admin_public_url('/css/app.min.css')?>" rel="stylesheet" type="text/css" id="app-style" />

    <!-- icons -->
    <link href="<?=admin_public_url('/css/icons.min.css')?>" rel="stylesheet" type="text/css" />

</head>

<body class="loading" data-layout-mode="horizontal" data-layout-color="light" data-layout-size="fluid" data-topbar-color="dark" data-leftbar-position="fixed">

<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-end mb-0">
                <li class="dropdown d-inline-block d-lg-none">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fe-search noti-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                        <form class="p-3">
                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                        </form>
                    </div>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="pro-user-name ms-1">
                                    Admin <i class="mdi mdi-chevron-down"></i>
                                </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>
                        <a href="#" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>My Account</span>
                        </a>
                        <a href="<?= site_url('edit-password') ?>" class="dropdown-item notify-item">
                            <i class="fe-lock"></i>
                            <span>Şifre değiştir</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= site_url('logout') ?>" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="#" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="<?=admin_public_url('/images/logo-sm.png')?>" alt="" height="22">
                            </span>
                    <span class="logo-lg">
                                <img src="<?=admin_public_url('/images/logo-light.png')?>" alt="" height="16">
                            </span>
                </a>
                <a href="#" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="<?=admin_public_url('/images/logo-sm.png')?>" alt="" height="22">
                            </span>
                    <span class="logo-lg">
                                <img src="<?=admin_public_url('/images/logo-dark.png')?>" alt="" height="16">
                            </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">

                <li>
                    <!-- Mobile menu toggle (Horizontal Layout)-->
                    <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

            </ul>

            <div class="clearfix"></div>

        </div>

    </div>
    <!-- end Topbar -->

    <div class="topnav">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav">
                        <?php if (isset($menus))
                        foreach ($menus as $menu): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link arrow-none" href="<?= $menu['url'] ?>" id="topnav-dashboard" role="button"
                               aria-haspopup="true" aria-expanded="false"> <?= $menu['title'] ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul> <!-- end navbar-->
                </div> <!-- end .collapsed-->
            </nav>
        </div> <!-- end container-fluid -->
    </div> <!-- end topnav-->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">