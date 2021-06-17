
    <!--================Main Header Area =================-->
    <?php 
    require_once "navbar_header.php";
    ?>
    <!--================End Main Header Area =================-->

    <!--================End Main Header Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Menu</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="menu.php">Menu</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Recipe Menu list Area =================-->
    <section class="price_list_area p_100">
        <div class="container">
            <div class="price_list_inner">
                <div class="single_pest_title">
                    <h2>Our Price List</h2>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
                <div class="row">
                <?php
                                $list_of_latestProducts = Product::getLatestProducts(8);
                                foreach($list_of_latestProducts as $key => $value) {
                            ?>
                    <div class="col-lg-6">
                        <div class="discover_item_inner">
                            <div class="discover_item">
                                <h4><?php echo $value['name'];?></h4>
                                <p><?php echo $value['description'];?> <span><?php echo $value['price'];?></span></p>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <div class="row our_bakery_image">
                    <div class="col-md-4 col-6">
                        <img class="img-fluid" src="img/our-bakery/bakery-1.jpg" alt="">
                    </div>
                    <div class="col-md-4 col-6">
                        <img class="img-fluid" src="img/our-bakery/bakery-2.jpg" alt="">
                    </div>
                    <div class="col-md-4 col-6">
                        <img class="img-fluid" src="img/our-bakery/bakery-3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->
    <?php require_once 'contact.php'?>