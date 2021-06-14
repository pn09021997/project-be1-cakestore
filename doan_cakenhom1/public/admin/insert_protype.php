<?php
require_once 'header-require-models.php';
?>
<?php
    $insertResult = -1;
    if(isset($_GET['type_name']) == TRUE) {
        $insertResult = Protype::insertProtype($_GET['type_name']);
    }
    header("Location: form.php?functionType=protypes&insertResult=$insertResult");
?>