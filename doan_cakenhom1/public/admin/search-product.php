<?php require_once 'header.php' ?>
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
        <h1>Manage Products</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><a href="insert_product.php"> <i class="icon-plus"></i>
                            </a></span>
                        <h5>Products</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Manufactures</th>
                                    <th>Product type</th>
                                    <th>Description</th>
                                    <th>Price (VND)</th>
                                    <th>Feature</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['keyword']) == TRUE) {
                                    $page = 1;
                                    if (isset($_GET['page']) == TRUE) {
                                        $page = $_GET['page'];
                                    }
                                    $resultsPerPage = 5;
                                    $totalResults = count(Product::searchProduct($_GET['keyword']));
                                    $list_of_products = Product::searchProduct_andCreatePagination($_GET['keyword'], $page, $resultsPerPage);

                                    // $totalLinks = ceil($totalResults/$resultsPerPage);
                                    if (isset($_GET['page']) == TRUE) {
                                        $page = $_GET['page'];
                                    }

                                    // Output:
                                    echo "<p style=\"text-align:center;\"><b>There are $totalResults results.</b></p>";
                                    foreach ($list_of_products as $key => $value) {
                                ?>
                                        <tr class="">
                                            <td width="250">
                                                <img src="../img/cake-feature/<?= $value['pro_image']; ?>" alt="" />
                                            </td>
                                            <td><?php echo $value['name']; ?></td>
                                            <td><?php echo Manufacturer::getBrand($value['manu_id']); ?></td>
                                            <td><?php echo Protype::getTypeName($value['type_id']); ?></td>
                                            <td><?php echo $value['description']; ?></td>
                                            <td><?php echo $value['price']; ?></td>
                                            <td><?php echo $value['feature']; ?></td>
                                            <td><?php echo $value['created_at']; ?></td>
                                            <td>
                                                <a href="form_update.php?functionType=products&id=<?php echo $value['id']; ?>" class="btn btn-success btn-mini">Edit</a>
                                                <a href="delete_product.php?id=<?php echo $value['id']; ?>" class="btn btn-danger btn-mini">Delete</a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="text-align:center;">
        <?php
        if (isset($_GET['keyword']) == TRUE) {
            echo Product::paginate("search-product.php?keyword=" . $_GET['keyword'] . "&", $page, $totalResults, $resultsPerPage, 2);
        }
        ?>
    </div>
</div>
<!-- END CONTENT -->
<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> 2017 &copy; TDC - Lập trình web 1</div>
</div>
<!--end-Footer-part-->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/matrix.js"></script>
<script src="js/matrix.tables.js"></script>
</body>

</html>