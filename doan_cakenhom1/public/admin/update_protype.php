<?php
require_once "config.php";
require_once "models/db.php";
require_once "models/product.php";
require_once "models/protype.php";
require_once "models/manufacturer.php";
$protype = new Protype;
?>
<?php
    $updateResult = -1;
    if(isset($_GET['type_name']) == TRUE) {
        $updateResult = Protype::updateProtype($_GET['type_id'], $_GET['type_name']);
    }
    header("Location: form_update.php?functionType=protypes&type_id=" .$_GET['type_id'] ."&updateResult=$updateResult");
?>