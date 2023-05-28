<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PT. Dito Enviro Kreasi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/img/logo/logo_dek.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/slick.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <style>
        h2 img {
            width: 100% !important;
            height: auto !important;
        }
    </style>
</head>

<body class="body-bg">
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?= get_logo() ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <div class="header-bottom  header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="<?= base_url() ?>"><img src="<?= get_logo() ?>" alt="" width="100px;"></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a href="<?= base_url() ?>">Home</a></li>
                                                <li><a href="#">Pelayanan</a>
                                                    <ul class="submenu">
                                                        <?php
                                                        if (count(get_category()->result()) > 0) {
                                                            foreach (get_category()->result() as $kategories) {
                                                        ?>
                                                                <li>
                                                                    <a href="<?= base_url('layanan/' . $kategories->id) ?>"><?= $kategories->judul ?></a>
                                                                </li>
                                                        <?php }
                                                        } ?>
                                                    </ul>
                                                </li>
                                                <li><a href="<?= base_url('galeri') ?>">Galeri</a></li>
                                                <li><a href="#">Tentang Kami</a>
                                                    <ul class="submenu">
                                                        <li><a href="<?= base_url('tentang-kami') ?>">Tentang Kami</a></li>
                                                        <!-- <li><a href="#">Portofolio</a></li> -->
                                                    </ul>
                                                </li>
                                                <li><a href="<?= base_url('kontak-kami') ?>">Kontak Kami</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>