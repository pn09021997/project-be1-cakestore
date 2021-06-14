<?php
require_once 'header-require-models.php';
    
    if(isset($_GET['id']) == TRUE) {
        User::deleteUserByID($_GET['id']);
    }
    header("Location: users.php");
?>