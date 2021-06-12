<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header('location:../public/login/login.php');
} else{
    $permission = $_SESSION['isLogin'];
    if ($permission != "User") {
        header('location:../public/login/login.php');
    }
} 

if (!isset($_GET['id'])) {
    header('location:./index.php');
} 
require_once "config.php";
require_once "models/db.php";
require_once "models/product.php";
require_once "models/protype.php";
require_once "models/manufacturer.php";
require_once "models/review.php";
$product = new Product;
$manufacturer = new Manufacturer;
$protype = new Protype;
$review = new Review;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cake - Bakery</title>

    <!-- Icon css link -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="vendors/linearicons/style.css" rel="stylesheet">
    <link href="vendors/flat-icon/flaticon.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Rev slider css -->
    <link href="vendors/revolution/css/settings.css" rel="stylesheet">
    <link href="vendors/revolution/css/layers.css" rel="stylesheet">
    <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
    <link href="vendors/animate-css/animate.css" rel="stylesheet">

    <!-- Extra plugin css -->
    <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="vendors/magnifc-popup/magnific-popup.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
<!--================Main Header Area =================-->
<header class="main_header_area">
    <div class="top_header_area row m0">
        <div class="container">
            <div class="float-left">
                <a href="tell:+18004567890"><i class="fa fa-phone" aria-hidden="true"></i> + (1800) 456 7890</a>
                <a href="mainto:info@cakebakery.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                    info@cakebakery.com</a>
            </div>
            <div class="float-right">
                <ul class="h_social list_style">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                <form action="search_result.php" method="get" style="float:right!important;margin:9px;">
                    <input type="text" name="keyword" placeholder="Search products...">
                    <input type="submit" name="submit" value="Search">
                </form>
            </div>
        </div>
    </div>
    <div class="main_menu_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo.png" alt="">
                    <img src="img/logo-2.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="my_toggle_menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="dropdown submenu active">
                        <li><a href="index.php">Home</a></li>
                        </li>
                        <li><a href="cake.php">Our Cakes</a></li>
                        <li><a href="menu.php">Menu</a></li>
                        <li class="dropdown submenu">
                        <li><a href="product-details.php">Detail</a></li>
                        </li>
                    </ul>
                    <ul class="navbar-nav justify-content-end">
                        <li class="dropdown submenu">
                        <li><a href="cate.php">Category</a></li>
                        </li>
                        <li class="dropdown submenu">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle"
                                href="#">Manufacturers &#9660;</a>
                            <ul class="dropdown-menu">
                                <?php
                                $list_of_manufacturers = Manufacturer::getAllManufacturers();
                                foreach($list_of_manufacturers as $key => $value) {
                            ?>
                                <li><a
                                        href="cate.php?manu_id=<?php echo $value['manu_id']; ?>"><?php echo $value['manu_name']; ?></a>
                                </li>
                                <?php
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="dropdown submenu">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle"
                                href="#">Types &#9660;</a>
                            <ul class="dropdown-menu">
                                <?php
                                $list_of_protypes = Protype::getAllProtypes();
                                foreach($list_of_protypes as $key => $value) {
                            ?>
                                <li><a
                                        href="cate.php?type_id=<?php echo $value['type_id']; ?>"><?php echo $value['type_name']; ?></a>
                                </li>
                                <?php
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="dropdown submenu">
                        <a href="cart.php">Cart</a>
                        </li>
                       
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--================End Main Header Area =================-->

<!--================End Main Header Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_text">
            <h3>Product Details</h3>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="product-details.html">Product Details</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Main Header Area =================-->

<!--================Product Details Area =================-->
<section class="product_details_area p_100">
    <?php
        $product_detail = Product::getProduct_ByID($_GET['id']);
        $type = Protype::getTypeName($product_detail['type_id']);
        // $manufacturer = Manufacturer::getBrand($product_detail['manu_id']);
    ?>
        <div class="container">
            <div class="row product_d_price">

                <div class="col-lg-6">
                    <div class="product_img"><img class="img-fluid" src="img/cake-feature/<?php echo $product_detail['pro_image']; ?>" alt=""></div>
                </div>

                <div class="col-lg-6">
                    <div class="product_details_text">
                        <h4><?php echo $product_detail['name']; ?></h4>
                        <p> <?php echo $product_detail['description']; ?></p>
                        <h5>Price :<span><?php echo $product_detail['price']; ?></span></h5>
                        <div class="quantity_box">
                            <label for="quantity">Quantity :</label>
                            <input type="text" placeholder="1" id="quantity">
                        </div>
                        <form action="cart.php" class="cart" style="text-align:center;" method="get">
                            <div style="display:inline-block;">
                                <input type="text" name="id" value="<?php echo $_GET['id']; ?>" readonly style="display:none;">
                                <div class="quantity">
                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                </div>
                                <br>
                                <button class="add_to_cart_button pink_more" type="submit">Add to cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="product_tab_area" role="tabpanel">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Descripton</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Review</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <?php echo $product_detail['description']; ?>
                    </div>

                    <div class="tab-pane fade show " id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <h2>Reviews</h2>
                        <form action="insert_review.php" method="post">
                            <div class="submit-review">
                                <input type="text" name="product_id" value="<?php echo $_GET['id']; ?>" readonly style="display:none;">
                                <p><label for="name">Name</label> <br>
                                    <input name="reviewer_name" type="text">
                                </p>
                                <p><label for="email">Email</label> <br> <input name="reviewer_email" type="email"></p>

                                <p><label for="review">Your review</label> <br> <textarea name="content" id="" cols="30" rows="5"></textarea></p>
                                <p><input type="submit" value="Submit"></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- Reviews: -->
<?php
$reviewPage = 1;
$reviewsPerPage = 3;
$totalReviews = count(Review::getReviews_ByProID($_GET['id']));
if (isset($_GET['page']) == TRUE) {
    $reviewPage = $_GET['page'];
}
$list_of_reviews = Review::getReviews_ByProID_andCreatePagination($_GET['id'], $reviewPage, $reviewsPerPage);
?>
<div class="container">
    <div class="reviews" style="padding: 0 0 50px 0;">
        <div class="related-products-title">REVIEWS (<?php echo $totalReviews; ?>):</div>
        <?php
        foreach ($list_of_reviews as $key => $value) {
        ?>
            <div class="review">
                <div class="reviewer"><?php echo $value['reviewer_name'] ?></div>
                <div class="review_content"><?php echo $value['content'] ?></div>
            </div>
        <?php
        }
        ?>
    </div>
    <div style="padding:0 0px 50px 0px;text-align:center;">
        <?php echo Review::paginate("product-details.php?id=" . $_GET['id'] . "&", $reviewPage, $totalReviews, $reviewsPerPage, 1); ?>
    </div>
</div>



<!--================End Product Details Area =================-->

<!--================Similar Product Area =================-->
<section class="similar_product_area p_100">
    <div class="container">
        <div class="main_title">
            <h2>Similar Products</h2>
        </div>
        <div class="row similar_product_inner">
            <?php
            $related_products = Product::getProducts_ByManuID($product_detail['manu_id']);
            $count = 0;
            foreach ($related_products as $key => $value) {
            ?>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="cake_feature_item">
                        <div class="cake_img">
                            <img src="img/cake-feature/<?php echo $value['pro_image']; ?>" alt="" width="270px" height="224px">
                        </div>

                        <div class="cake_text">
                            <h4><?php echo $value['price']; ?></h4>
                            <h3><?php echo $value['name']; ?></h3>
                            <a class="pest_btn" href="cart.php?id=<?php echo $value['id']; ?>">Add to cart</a>
                        </div>
                    </div>
                </div>
            <?php
                $count++;
                if ($count >= 4) {
                    break;
                }
            }
            ?>
        </div>
    </div>
</section>
<!--================End Similar Product Area =================-->
<?php require_once 'contact.php'?>