<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Biyomedical - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= public_url('img/favicon.png') ?>" rel="icon">
    <link href="<?= public_url('img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= public_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="<?= public_url('vendor/animate.css/animate.min.css') ?>" rel="stylesheet">
    <link href="<?= public_url('vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= public_url('vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= public_url('vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= public_url('vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
    <link href="<?= public_url('vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
    <link href="<?= public_url('vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= public_url('css/style.css') ?>" rel="stylesheet">
</head>

<body>

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope"></i> <a href="mailto:info@biyomedikal.com">info@biyomedikal.com</a>
        </div>
        <div class="d-none d-lg-flex social-links align-items-center">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>

    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="<?= site_url('index') ?>">Biyomedical</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto" href="<?= site_url('index') ?>">Anasayfa</a></li>
                <li><a class="nav-link scrollto" href="#about">Hakkında</a></li>

                <?php if (session('user_id')): ?>
                    <li><a class="nav-link scrollto" href="<?= site_url('products')?>">Cihazlar</a></li>
                    <li><a class="nav-link scrollto" href="<?= site_url('ads')?>">İlanlar</a></li>
                <?php endif; ?>
                <li><a class="nav-link scrollto" href=""></a></li>
                <li><a class="nav-link scrollto" href=""></a></li>
                <?php if (session('user_role_id') === 3): ?>
                    <ul style="background: #0a53be">
                        <li class="dropdown"><a
                                    href="#"><span class="text-capitalize"><?= session('user_name') . ' ' . session('user_sure_name') ?></span>
                                <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="<?= site_url('profil') ?>">Profil</a></li>
                                <li><a href="<?= site_url('edit-password') ?>">Şifre Değiştir</a></li>
                                <li><a href="<?= site_url('logout') ?>">Çıkış Yap</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php elseif (session('user_role_id') === 1): ?>
                    <ul">
                        <li class="dropdown"><a
                                    href="#"><span class="text-capitalize"><?= session('user_name') . ' ' . session('user_sure_name') ?></span>
                                <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="<?= site_url('profil') ?>">Profil</a></li>
                                <li><a href="<?= site_url('admin/index') ?>">Admin Panel</a></li>
                                <li><a href="<?= site_url('edit-password') ?>">Şifre Değiştir</a></li>
                                <li><a href="<?= site_url('logout') ?>">Çıkış Yap</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php elseif (session('user_role_id') === 2): ?>
                    <ul>
                        <li class="dropdown"><a
                                    href="#"><span class="text-capitalize"><?= session('user_name') . ' ' . session('user_sure_name') ?></span>
                                <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="<?= site_url('profil') ?>">Profil</a></li>
                                <li><a href="<?= site_url('myproduct') ?>">Cihazlarim</a></li>
                                <li><a href="<?= site_url('edit-password') ?>">Şifre Değiştir</a></li>
                                <li><a href="<?= site_url('logout') ?>">Çıkış Yap</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php elseif (session('user_role_id') === 5): ?>
                    <ul>
                        <li class="dropdown"><a
                                    href="#"><span class="text-capitalize"><?= session('user_name') . ' ' . session('user_sure_name') ?></span>
                                <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="<?= site_url('profil') ?>">Profil</a></li>
                                <li><a href="<?= site_url('myads') ?>">İlanlarim</a></li>
                                <li><a href="<?= site_url('myapplications') ?>">Başvurular</a></li>
                                <li><a href="<?= site_url('edit-password') ?>">Şifre Değiştir</a></li>
                                <li><a href="<?= site_url('logout') ?>">Çıkış Yap</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php else: ?>
                    <li><a class="nav-link scrollto" href="<?= site_url('login') ?>">GİRİŞ</a></li>
                <?php endif; ?>
            </ul>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
