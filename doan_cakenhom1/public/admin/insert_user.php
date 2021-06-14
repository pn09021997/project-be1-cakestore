<?php
require_once 'header-require-models.php';
?>
<?php
    $insertResult = -1;

    if(isset($_GET['username'])==TRUE) {
        $insertResult = User::insertUser($_GET['username'], password_hash($_GET['password'], PASSWORD_DEFAULT), $_GET['permission']);
    }
    header("Location: form.php?functionType=users&insertResult=$insertResult");
?>  