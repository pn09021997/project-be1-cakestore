


<?php
require_once "config.php";
require_once "models/db.php";
require_once "models/product.php";
require_once "models/protype.php";
require_once "models/manufacturer.php";
$product = new Product;
    
    if(isset($_GET['id']) == TRUE) {
        Product::deleteProductByID($_GET['id']);
    }
    header("Location: index.php");
?>