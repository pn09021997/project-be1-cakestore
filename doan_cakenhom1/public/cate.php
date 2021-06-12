
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
    <!--================End Main Header Area =================-->

    <!--================Blog Main Area =================-->

        <div class="container">
            <div class="main_title">
                <h2>Our Cakes</h2>
                <h5>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</h5>
            </div>
            

            <!-- ____________________________________________________________________________________________________ -->
            <!-- Lấy danh sách sản phẩm theo manufacturer.  -->
            <div class=" row">
                <?php
                    if(isset($_GET['manu_id']) == TRUE && isset($_GET['type_id']) == FALSE) {
                        $page = 1;
                        $resultsPerPage = 8;
                        $totalResults = count(Product::getProducts_ByManuID($_GET['manu_id']));
                        if(isset($_GET['page']) == TRUE) {
                            $page = $_GET['page'];
                        }
                        $list_of_products = Product::getProducts_ByManuID_andCreatePagination($_GET['manu_id'], $page, $resultsPerPage);
                     
                      
                        // Output:
                    
                        foreach($list_of_products as $key => $value) {
                            
                ?>

                <div class="col-lg-3 col-md-4 col-6">
                    <div class="cake_feature_item">
                        <div class="cake_img">
                            <img src="img/cake-feature/<?php echo $value['pro_image']; ?>" alt="" width="270px" height="224px">
                        </div>
                        <div class="cake_text">
                            <h4><a
                                    href="product-details.php?id=<?php echo $value['id']; ?>"><?php echo $value['price']; ?></a>
                            </h4>
                            <h3><?php echo $value['name'];?></h3>
                            <a class="pest_btn" href="add-cart.php?id=<?php echo $value['id'];?>">Add to cart</a>
                        </div>
                    </div>
                </div>


                <!-- ____________________________________________________________________________________________________ -->
                <!-- Lấy danh sách sản phẩm theo protype.  -->
                <?php
                    } }
                    else if(isset($_GET['type_id']) == TRUE && isset($_GET['manu_id']) == FALSE) {
                        $page = 1;
                        $resultsPerPage = 8;
                        $totalResults = count(Product::getProducts_ByTypeID($_GET['type_id']));
                        if(isset($_GET['page']) == TRUE) {
                            $page = $_GET['page'];
                        }
                        $list_of_products = Product::getProducts_ByTypeID_andCreatePagination($_GET['type_id'], $page, $resultsPerPage);
                      
                        
                        // Output:
                    
                        foreach($list_of_products as $key => $value) {
                ?>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="cake_feature_item">
                        <div class="cake_img">
                            <img src="img/cake-feature/<?php echo $value['pro_image']; ?>" alt="" width="270px" height="224px">
                        </div>
                        <div class="cake_text">
                            <h4><a
                                    href="product-details.php?id=<?php echo $value['id']; ?>"><?php echo $value['price']; ?></a>
                            </h4>
                            <h3><?php echo $value['name'];?></h3>
                            <a class="pest_btn" href="add-cart.php?id=<?php echo $value['id'];?>">Add to cart</a>
                        </div>
                    </div>
                </div>
                <!-- ____________________________________________________________________________________________________ -->
                <!-- Lấy danh sách sản phẩm theo protype và manufacturer.  -->
                <?php
                    } }
                    else if(isset($_GET['type_id']) == TRUE && isset($_GET['manu_id']) == TRUE) {
                        $page = 1;
                        $resultsPerPage = 8;
                        $totalResults = count(Product::getProducts_ByTypeAndManu($_GET['type_id'], $_GET['manu_id']));
                        if(isset($_GET['page']) == TRUE) {
                            $page = $_GET['page'];
                        }
                        $list_of_products = Product::getProducts_ByTypeAndManu_andCreatePagination($_GET['type_id'], $_GET['manu_id'], $page, $resultsPerPage);
                    
                        
                        // Output:
                    
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
                            <a class="pest_btn" href="add-cart.php?id=<?php echo $value['id'];?>">Add to cart</a>
                        </div>
                    </div>
                </div>

                <?php } }?>
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