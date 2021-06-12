<?php
session_start();
require_once "config.php";
require_once "models/db.php";
require_once "models/product.php";
require_once "models/protype.php";
require_once "models/manufacturer.php";
$product = new Product;
$manufacturer = new Manufacturer;
$protype = new Protype;

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
    <link href="vendors/stroke-icon/style.css" rel="stylesheet">
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


</head>

<body>

    <!--================Main Header Area =================-->
    <?php
      require_once 'navbar_header.php';
      ?>
    <!--================End Main Header Area =================-->

    <!--================End Main Header Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Our Cakes</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                </ul>
            </div>
        </div>
    </section>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <?php
                            if(isset($_GET['keyword'])==TRUE) {
                                echo '<h2>Search result for "' . $_GET['keyword'] . '"</h2>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Main Header Area =================-->

    <!--================Blog Main Area =================-->

        <div class="container">
            <div class="main_title">
                <h2>Our Cakes</h2>
                <!-- <h5>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</h5> -->
            </div>
            

            <!-- ____________________________________________________________________________________________________ -->
            <!-- Lấy danh sách sản phẩm theo manufacturer.  -->
            <div class=" row">
            <?php
                    if(isset($_GET['keyword'])==TRUE) {
                        $page = 1;
                        if(isset($_GET['page'])==TRUE) {
                            $page = $_GET['page'];
                        }
                        $resultsPerPage = 8;
                        $totalResults = count(Product::searchProduct($_GET['keyword']));
                        $list_of_products = Product::searchProduct_andCreatePagination($_GET['keyword'], $page, $resultsPerPage);

                        // Output:
                        // echo "<p style=\"text-align:center;\"><b>There are $totalResults results.</b></p>";
                        foreach($list_of_products as $key => $value) {
                ?>
         

                <div class="col-lg-3 col-md-4 col-6 py-5">
                    <div class="cake_feature_item">
                        <div class="cake_img">
                            <img src="img/cake-feature/<?php echo $value['pro_image']; ?>" alt="" width="270px" height="224px">
                        </div>
                        <div class="cake_text">
                            <h4><a
                                    href="product-details.php?id=<?php echo $value['id']; ?>"><?php echo $value['price']; ?></a>
                            </h4>
                            <h3><?php echo $value['name'];?></h3>
                            <a class="pest_btn" href="cart.php?id=<?php echo $value['id'];?>">Add to cart</a>
                        </div>
                    </div>
                </div>

                <?php } }?>
            </div>
            <div>
            <div style="text-align:center; padding:30px;">
                <?php
                    if(isset($_GET['keyword'])==TRUE) {
                        echo Product::paginate("search_result.php?keyword=" . $_GET['keyword'] ."&", $page, $totalResults, $resultsPerPage, 2);
                    }
                ?>
            </div>
        </div>
        </div>


    
    <!--================End Blog Main Area =================-->

    <!--================Special Recipe Area =================-->
    <section class="special_recipe_area">
        <div class="container">
            <div class="special_recipe_slider owl-carousel">
                <div class="item">
                    <div class="media">
                        <div class="d-flex">
                            <img src="img/recipe/recipe-1.png" alt="">
                        </div>
                        <div class="media-body">
                            <h4>Special Recipe</h4>
                            <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                                nisi ut aliquid ex ea commodi equatur uis autem vel eum.</p>
                            <a class="w_view_btn" href="#">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="media">
                        <div class="d-flex">
                            <img src="img/recipe/recipe-1.png" alt="">
                        </div>
                        <div class="media-body">
                            <h4>Special Recipe</h4>
                            <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                                nisi ut aliquid ex ea commodi equatur uis autem vel eum.</p>
                            <a class="w_view_btn" href="#">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="media">
                        <div class="d-flex">
                            <img src="img/recipe/recipe-1.png" alt="">
                        </div>
                        <div class="media-body">
                            <h4>Special Recipe</h4>
                            <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                                nisi ut aliquid ex ea commodi equatur uis autem vel eum.</p>
                            <a class="w_view_btn" href="#">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="media">
                        <div class="d-flex">
                            <img src="img/recipe/recipe-1.png" alt="">
                        </div>
                        <div class="media-body">
                            <h4>Special Recipe</h4>
                            <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                                nisi ut aliquid ex ea commodi equatur uis autem vel eum.</p>
                            <a class="w_view_btn" href="#">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Special Recipe Area =================-->
    <?php require_once 'contact.php'?>