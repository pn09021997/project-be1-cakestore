<?php
require_once "config.php";
require_once "models/db.php";
require_once "models/product.php";
require_once "models/protype.php";
require_once "models/manufacturer.php";
$protype = new Protype;
?>
<?php
    $insertResult = -1;
    if(isset($_GET['type_name']) == TRUE) {
        $insertResult = Protype::insertProtype($_GET['type_name']);
    }
    header("Location: form.php?functionType=protypes&insertResult=$insertResult");
?>