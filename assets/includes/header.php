<!DOCTYPE HTML>
<html>

<head>
    <title></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?= urlOf('assets/bootstrap/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= urlOf('assets/css/main.css') ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <noscript>
        <link rel="stylesheet" href="<?= urlOf('assets/css/noscript.css') ?>" />
    </noscript>
</head>

<body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Header -->
        <header id="header">
            <div class="inner">
                <!-- Logo -->
                <a href="<?= urlOf('') ?>" class="logo">
                    <span class="fa fa-book"></span> <span class="title">Book Ki Dukan</span>
                </a>
                <!-- Nav -->
                <nav>
                    <ul>
                        <li><a href="#menu">Menu</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <!-- Menu -->
        <nav id="menu">
            <h2>Menu</h2>
            <ul>
                <li><a href="<?= urlOf('') ?>">Home</a></li>
                <?php if (!isset($_SESSION['userId'])) { ?>
                    <li><a href="<?= urlOf('pages/authentication-login.php') ?>">Login</a></li>
                <?php  } else {  ?>
                    <li><a href="<?= urlOf('assets/api/logout.php') ?>">Logout</a></li>
                <?php  } ?>
                <li><a href="<?= urlOf('pages/user_products.php') ?>">Books</a></li>
                <?php if (isset($_SESSION['userId'])) { ?>
                    <li><a href="<?= urlOf('pages/checkout.php') ?>">Checkout</a></li>
                    <li><a href="<?= urlOf('pages/myOrders.php') ?>">My Orders</a></li>
                    <li><a href="<?= urlOf('pages/updateProfile.php') ?>">Update Profile</a></li>
                <?php  }   ?>
                <li><a href="<?= urlOf('pages/about.php') ?>">About Us</a></li>
                <li><a href="<?= urlOf('pages/contact.php') ?>">Contact Us</a></li>
            </ul>
        </nav>