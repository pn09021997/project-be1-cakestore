<?php
session_start();
require_once "config.php";
require_once "models/db.php";
require_once "models/product.php";
require_once "models/protype.php";
require_once "models/manufacturer.php";
require_once "models/review.php";
$product = new Product;
$manufacturer = new Manufacturer;
$protype = new Protype;
$review = new Review;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cake - Bakery</title>

    <!-- Icon css link -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="vendors/linearicons/style.css" rel="stylesheet">
    <link href="vendors/flat-icon/flaticon.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Rev slider css -->
    <link href="vendors/revolution/css/settings.css" rel="stylesheet">
    <link href="vendors/revolution/css/layers.css" rel="stylesheet">
    <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
    <link href="vendors/animate-css/animate.css" rel="stylesheet">

    <!-- Extra plugin css -->
    <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="vendors/magnifc-popup/magnific-popup.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
<!--================Main Header Area =================-->
<header class="main_header_area">
    <div class="top_header_area row m0">
        <div class="container">
            <div class="float-left">
                <a href="tell:+18004567890"><i class="fa fa-phone" aria-hidden="true"></i> + (1800) 456 7890</a>
                <a href="mainto:info@cakebakery.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                    info@cakebakery.com</a>
            </div>
            <div class="float-right">
                <form action="./cake.php" method="get" style="float:right!important;margin:9px;">
                    <input type="text" name="keyword" placeholder="Search products...">
                    <input type="submit" name="submit" value="Search" class="btn btn-outline-danger">
                </form>
            </div>
        </div>
    </div>
    <div class="main_menu_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo.png" alt="">
                    <img src="img/logo-2.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="my_toggle_menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="dropdown submenu active">
                        <li><a href="index.php">Home</a></li>
                        </li>
                        <li><a href="cake.php">Our Cakes</a></li>
                        <li><a href="menu.php">Menu</a></li>
                        <li class="dropdown submenu">
                        <li><a href="product-details.php">Detail</a></li>
                        </li>
                    </ul>
                    <ul class="navbar-nav justify-content-end">
                        <li class="dropdown submenu">
                        </li>
                        <li class="dropdown submenu">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle"
                                href="#">Manufacturers &#9660;</a>
                            <ul class="dropdown-menu">
                                <?php
                                $list_of_manufacturers = Manufacturer::getAllManufacturers();
                                foreach($list_of_manufacturers as $key => $value) {
                            ?>
                                <li><a
                                        href="cate.php?manu_id=<?php echo $value['manu_id']; ?>"><?php echo $value['manu_name']; ?></a>
                                </li>
                                <?php
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="dropdown submenu">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle"
                                href="#">Types &#9660;</a>
                            <ul class="dropdown-menu">
                                <?php
                                $list_of_protypes = Protype::getAllProtypes();
                                foreach($list_of_protypes as $key => $value) {
                            ?>
                                <li><a
                                        href="cate.php?type_id=<?php echo $value['type_id']; ?>"><?php echo $value['type_name']; ?></a>
                                </li>
                                <?php
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="dropdown submenu">
                        <a href="cart.php">Cart</a>
                        </li>
                        <li><a href="../public/login/remove_sessionLogin.php" style="color: red !important;">Logout</a></li>
                       
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>