<?php
 require_once "config.php";
 require_once "models/db.php";
 require_once "models/product.php";
 require_once "models/protype.php";
 require_once "models/manufacturer.php";
 require_once "models/user.php";
 $user = new User;
    
    if(isset($_GET['id']) == TRUE) {
        User::deleteUserByID($_GET['id']);
    }
    header("Location: users.php");
?>