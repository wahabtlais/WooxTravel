<?php
session_start();
define("ROOT_URL", "http://localhost/wooxtravel/");
define("COUNTRY_IMG_URL", "http://localhost/wooxtravel/admin/countries-admins/images-countries/");
define("CITY_IMG_URL", "http://localhost/wooxtravel/admin/cities-admins/city-images/");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>WoOx Travel Bootstrap 5 Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= ROOT_URL ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/owl.css">
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!--

TemplateMo 580 Woox Travel

https://templatemo.com/tm-580-woox-travel

-->

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="<?= ROOT_URL ?>" class="logo">
                            <img src=" <?= ROOT_URL ?>assets/images/logo.png" alt="" ">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class=" nav">
                            <li><a href="<?= ROOT_URL ?>index.php" class="active">Home</a></li>
                            <li><a href="<?= ROOT_URL ?>deals.php">Deals</a></li>
                            <?php if (isset($_SESSION['username'])) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <?= $_SESSION['username']; ?>
                                </a>
                                <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item text-black"
                                            href="<?= ROOT_URL ?>users/user.php?id=<?= $_SESSION['user_id']; ?>">Your
                                            Bookings</a></li>
                                    <li><a class="dropdown-item text-black" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider text-black">
                                    </li>
                                    <li><a class="dropdown-item text-black"
                                            href="<?= ROOT_URL ?>auth/logout.php">Logout</a></li>
                                </ul>
                            </li>
                            <?php else : ?>
                            <li><a href="<?= ROOT_URL ?>auth/login.php">Login</a></li>
                            <li><a href="<?= ROOT_URL ?>auth/register.php">Register</a></li>
                            <?php endif ?>
                            </ul>
                            <a class='menu-trigger'>
                                <span>Menu</span>
                            </a>
                            <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->