<?php
require_once 'header-require-models.php';
    
    $deleteResult = "";
    if(isset($_GET['type_id']) == TRUE) {
        // Kiểm tra xem có còn sản phẩm nào thuộc protype đó hay không, nếu còn thì không được xóa.
        if(count(Product::getProducts_ByTypeID($_GET['type_id'])) == 0) {
            Protype::deleteProtype_ByTypeID($_GET['type_id']);
            $deleteResult = 1;
        }
        else {
            $deleteResult = 0;
        }
    }
    header("Location: protypes.php?deleteResult=$deleteResult");
?>