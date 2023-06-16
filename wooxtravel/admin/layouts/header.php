<?php
session_start();
define("ADMIN_URL", "http://localhost/wooxtravel/admin/");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= ADMIN_URL ?>styles/style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">LOGO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarText">
                    <?php if (isset($_SESSION['admin_name'])) : ?>
                    <ul class="navbar-nav side-nav">
                        <li class="nav-item">
                            <a class="nav-link" style="margin-left: 20px;" href="<?= ADMIN_URL ?>">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ADMIN_URL ?>admins/admins.php"
                                style="margin-left: 20px;">Admins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ADMIN_URL ?>countries-admins/show-country.php"
                                style="margin-left: 20px;">Countries</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ADMIN_URL ?>cities-admins/show-cities.php"
                                style="margin-left: 20px;">Cities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ADMIN_URL ?>bookings-admins/show-bookings.php"
                                style="margin-left: 20px;">Bookings</a>
                        </li>
                    </ul>
                    <?php endif; ?>
                    <ul class="navbar-nav ml-md-auto d-md-flex">
                        <?php if (!isset($_SESSION['admin_name'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ADMIN_URL ?>admins/login-admins.php">login
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item dropdown">

                            <?php if (isset($_SESSION['admin_name'])) : ?>
                            <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $_SESSION['admin_name'] ?>
                            </a>
                            <?php endif; ?>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= ADMIN_URL ?>admins/logout.php">Logout</a>
                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">