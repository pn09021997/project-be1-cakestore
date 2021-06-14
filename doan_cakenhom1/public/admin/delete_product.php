
<?php
require_once 'header-require-models.php';
    
    if(isset($_GET['id']) == TRUE) {
        Product::deleteProductByID($_GET['id']);
    }
    header("Location: index.php");
?>