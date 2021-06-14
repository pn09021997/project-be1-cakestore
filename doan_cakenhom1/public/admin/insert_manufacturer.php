<?php
require_once 'header-require-models.php';
?>
<?php
    $insertResult = -1;
    if(isset($_GET['manu_name']) == TRUE) {
        $insertResult = Manufacturer::insertManufacturer($_GET['manu_name']);
    }
    header("Location: form.php?functionType=manufacturers&insertResult=$insertResult");
?>