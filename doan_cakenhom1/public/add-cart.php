<?php
session_start();

if (isset($_SESSION['isLogin'])) {
    $permission = $_SESSION['isLogin'];
    if ($permission == "User") {
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
                        header('location:./cart.php');
                        break;
                }
            } else {
                if (isset($_SESSION['cart'][$id])) {
                    $qty = $_SESSION['cart'][$id];
                    $_SESSION['cart'][$id] = $qty + 1;
                    header('location:' . $_SERVER['HTTP_REFERER']);
                } else {
                    $_SESSION['cart'][$id] = 1;
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
} else {
    header('location:../public/login/login.php');
}
