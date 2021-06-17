<?php
session_start();

if (isset($_SESSION['isLogin']['User'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($id[0] == 'r' || $id[0] == 'p' || $id[0] == 'm') {
            $newId = substr($id, 1, strlen($id));
            switch ($id[0]) {
                case 'r':
                    unset($_SESSION['cart'][$newId]);
                    header('location:./cart.php');
                    break;
                case 'm':
                    $qty = $_SESSION['cart'][$newId];
                    if ($qty == 1) {
                        unset($_SESSION['cart'][$newId]);
                        header('location:./cart.php');
                    } else {
                        $_SESSION['cart'][$newId] = $qty - 1;
                        header('location:./cart.php');
                    }
                    break;
                case 'p':
                    $newId = substr($id, 1, strlen($id));
                    $qty = $_SESSION['cart'][$newId];
                    $_SESSION['cart'][$newId] = $qty + 1;
                    header('location:./cart.php');
                    break;
                default:
                    echo "1";
                    header('location:./cart.php');
                    break;
            }
        } else {
            $number_Quantity = 1;
            if (isset($_GET['quantity'])) {
                $number_Quantity = $_GET['quantity'];
            }
            if (isset($_SESSION['cart'][$id])) {
                $qty = $_SESSION['cart'][$id];
                $_SESSION['cart'][$id] = $qty + $number_Quantity;
                header('location:' . $_SERVER['HTTP_REFERER']);
            } else {
                $_SESSION['cart'][$id] = $number_Quantity;
                header('location:' . $_SERVER['HTTP_REFERER']);
            }
        }
    } else {
        unset($_SESSION['cart']);
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
} else {
    header('location:../public/login/login.php');
}
