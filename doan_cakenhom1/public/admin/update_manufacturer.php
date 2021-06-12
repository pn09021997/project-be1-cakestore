<?php
require_once "config.php";
require_once "models/db.php";
require_once "models/product.php";
require_once "models/protype.php";
require_once "models/manufacturer.php";
$manufacturer = new Manufacturer;
?>
<?php
    $updateResult = -1;
    if(isset($_GET['manu_name']) == TRUE) {
        $updateResult = Manufacturer::updateManufacturer($_GET['manu_id'], $_GET['manu_name']);
    }
    header("Location: form_update.php?functionType=manufacturers&manu_id=" .$_GET['manu_id'] ."&updateResult=$updateResult");
?>