<?php
require_once "config.php";
require_once "models/db.php";
require_once "models/product.php";
require_once "models/protype.php";
require_once "models/manufacturer.php";
$manufacturer = new Manufacturer;
?>
<?php
    $insertResult = -1;
    if(isset($_GET['manu_name']) == TRUE) {
        $insertResult = Manufacturer::insertManufacturer($_GET['manu_name']);
    }
    header("Location: form.php?functionType=manufacturers&insertResult=$insertResult");
?>