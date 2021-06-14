<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header('../login/login.php');
} else {
    $permission = $_SESSION['isLogin'];
    if ($permission != "Admin") {
        header('../login/login.php');
    }
}

require_once "config.php";
require_once "models/db.php";
require_once "models/product.php";
require_once "models/protype.php";
require_once "models/manufacturer.php";
require_once "models/user.php";
$product = new Product;
$manufacturer = new Manufacturer;
$protype = new Protype;
$user = new User;