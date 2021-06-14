<?php
session_start();
include_once "../admin/config.php";
include_once "../admin/models/Db.php";
include_once "../admin/models/user.php";
$userInfo = new User();
if (isset($_POST['login'])) {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['permission'])) {
        $getUserLogin = $userInfo->getUserLogin($_POST['username'], $_POST['permission']);
        if (count($getUserLogin) != 0) {
            if ($getUserLogin[0]['password'] == md5($_POST['password'])) {
                if ($getUserLogin[0]['permission'] == "Admin") {
                    $_SESSION['isLogin'] = "Admin";
                    header('location:../admin/index.php');
                }
                if ($getUserLogin[0]['permission'] == "User") {
                    $_SESSION['isLogin'] = "User";
                    header('location:../index.php');
                }
            } else {
                echo "<script language='javascript'>
                alert('Plz Enter Again!!!');
            </script>";
            }
        } else {
            echo "<script language='javascript'>
            alert('Plz Enter Again!!!');
        </script>";
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
            }
            header('location:./login.php');
        } else {
            header('location:' . $_SERVER['HTTP_REFERER']);
        }
    } else {
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
}
