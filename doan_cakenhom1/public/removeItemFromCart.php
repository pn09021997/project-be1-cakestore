<?php
session_start();
?>

<?php
require_once "config.php";
require_once "models/db.php";
require_once "models/product.php";
?>

<?php

if (isset($_GET['id']) == TRUE) {

    // Nếu chưa có cart, thì quay lại trang cart.php.
    if (isset($_SESSION['cart']) == FALSE) {
        header("Location:cart.php");
    }

    // Nếu có cart:
    foreach ($_SESSION['cart'] as $item => $detail) {
        unset($_SESSION['cart'][$item]);
        header("Location:cart.php");
    }
}
?>