<!--================Main Header Area =================-->
<?php
require_once "navbar_header.php";
?>
<!--================End Main Header Area =================-->

<!--================End Main Header Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_text">
            <h3>Cart</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="cart.php">Cart</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Main Header Area =================-->

<!--================Cart Table Area =================-->
<section class="cart_table_area p_100">
    <?php
    $totalPrice = 0;
    ?>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="table-cart">
                    <?php
                    if (isset($_SESSION['cart']) == TRUE) {
                        foreach ($_SESSION['cart'] as $item => $detail) {
                            $product = Product::getProduct_ByID($item);
                    ?>
                            <tr>
                                <td class="product-thumbnail">
                                    <a href="product-details.php?id=<?php echo $product['id']; ?>"><img style="width:100%;height:auto;" alt="poster_1_up" class="shop_thumbnail" src="img/cake-feature/<?php echo $product['pro_image']; ?>"></a>
                                </td>
                                <td class="product-name">
                                    <a href="product-details.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                                </td>
                                <td class="product-price">
                                    <span class="amount"><?php echo number_format($product['price']); ?>
                                        đ</span>
                                </td>
                                <td class="product-quantity text-center">
                                    <div class="quantity buttons_added">
                                        <a href="add-cart.php?id=m<?= $item ?>" class="btn btn-outline-info" style="float: left">-</a>
                                        <span class="product-quantity"><?php echo $detail ?></span>
                                        <a href="add-cart.php?id=p<?= $item ?>" class="btn btn-outline-info" style="float: right">+</a>
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount"><?php $totalPrice += $detail * $product['price'];
                                                            echo number_format($detail * $product['price']); ?> đ</span>
                                </td>
                                <td class="product-remove">
                                    <a title="Remove this item" class="remove" href="add-cart.php?id=r<?php echo $item; ?>">X</a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="row cart_total_inner">
            <div class="col-lg-7"></div>
            <div class="col-lg-5">
                <div class="cart_total_text">
                    <div class="cart_head">
                        Cart Total
                    </div>
                    <div class="total">
                        <h4>Total <strong><span class="amount">
                                    <?= number_format($totalPrice);
                                    ?>
                                    đ</span></strong></h4>
                    </div>
                    <div class="cart_footer">
                        <a class="pest_btn" href="./cake.php">Shopping</a>
                        <a class="pest_btn" href="add-cart.php">Remove All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Table Area =================-->

<?php require_once 'contact.php' ?>