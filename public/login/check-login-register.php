<?php
session_start();
include_once "../config.php";
include_once "../models/db.php";
include_once "../models/user.php";
include_once "../models/order.php";
$userInfo = new User();
if (isset($_POST['login'])) {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['permission'])) {
        $getUserLogin = $userInfo->getUserLogin($_POST['username'], $_POST['permission']);
        if (count($getUserLogin) != 0) {
            if ($getUserLogin[0]['password'] == md5($_POST['password'])) {
                if ($getUserLogin[0]['permission'] == "Admin") {
                    $_SESSION['isLogin']["Admin"] = $getUserLogin[0]['id'];
                    header('location:../admin/index.php');
                }
                if ($getUserLogin[0]['permission'] == "User") {
                    $_SESSION['isLogin']["User"] = $getUserLogin[0]['id'];
                    header('location:../index.php');
                }
            } else {
                header('location:./login.php');
            }
        } else {
            header('location:./login.php');
        }
    }
} else if (isset($_POST['register'])) {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_Password = $_POST['password2'];
        if ($password == $confirm_Password) {
            $flag = true;
            $getAllUser = User::getAllUsers();
            foreach ($getAllUser as $key) {
                if ($key['username'] == $username) {
                    $flag = false;
                }
            }
            if ($flag == true) {
                $insertUser = User::insertUser($username, md5($password), 'User');
                if ($insertUser) { 
                    $getUserLogin = User::getUserLogin($username, 'User');
                    if (count($getUserLogin) != 0) {
                        $getOrder_ByCustomerId = Order::getOrder_ByCustomerId($getUserLogin[0]['id']);
                        if (count($getOrder_ByCustomerId) == 0) {
                            $insertUser = Order::insertOrder($getUserLogin[0]['id']);
                        } 
                    }
                }
            }
            header('location:./login.php');
        } else {
            header('location:./login.php');
        }
    } else {
        header('location:./login.php');
    }
}
