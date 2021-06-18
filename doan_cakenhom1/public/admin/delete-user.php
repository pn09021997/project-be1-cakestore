<?php
require_once 'header-require-models.php';
$deleteResult = -1;
if (isset($_GET['id']) == TRUE) {
    $deleteResult = User::deleteUserByID($_GET['id']);
}
header("Location: users.php");
