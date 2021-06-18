
<?php
require_once 'header-require-models.php';
$deleteResult = -1;
if (isset($_GET['id'])) {
    $removeReview_ById = Review::removeReview_ById($_GET['id']);
    $deleteResult = Product::deleteProductByID($_GET['id']);
}
header("Location: index.php");