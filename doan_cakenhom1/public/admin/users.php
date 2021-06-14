<?php require_once 'header.php'?>
<!-- BEGIN CONTENT -->
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom current"><i
                        class="icon-home"></i> Home</a></div>
            <h1>Manage User</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><a href="form.php?functionType=users"> <i class="icon-plus"></i></a></span>
                            <h5>Users</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Permission</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $page = 1;
                                        $resultsPerPage = 5;
                                        $totalResults = count(User::getAllUsers());
                                        // var_dump(User::getAllUsers());
                                        // $totalLinks = ceil($totalResults/$resultsPerPage);
                                        if(isset($_GET['page'])==TRUE) {
                                            $page = $_GET['page'];
                                        }
                                        $list_of_users = User::getAllUsers_andCreatePagination($page, $resultsPerPage);
                                   

                                        // Output:
                                        echo "<p style=\"text-align:center;\"><b>There are $totalResults results.</b></p>";
                                        if(isset($_SESSION['users']) && $_SESSION['users']['permission']==1){
                                        foreach ($list_of_users as $key => $value) {
                                    ?>
                                    <tr class="">
                                        <td><?php echo $value['username']; ?></td>
                                        <td><?php echo $value['password']; ?></td>
                                        <td><?php if($value['permission']=="Admin"){echo "Admin";}else{echo "User";} ?></td>
                                        <td>
                                            <a href="form_update.php?functionType=user&user_id=<?php echo $value['id']; ?>" class="btn btn-success btn-mini">Edit</a>
                                            <a href="delete-user.php?id=<?php echo $value['id']; ?>" class="btn btn-danger btn-mini">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    }else{
                                        foreach ($list_of_users as $key => $value) {
                                            // if($_SESSION['users']['id'] == $value['id']){
                                    ?>
                                        <tr class="">
                                        <td><?php echo $value['username']; ?></td>
                                        <td><?php echo $value['password']; ?></td>
                                        <td><?php if($value['permission']=="Admin"){echo "Admin";}else{echo "User";} ?></td>
                                        <td>
                                            <a href="form_update.php?functionType=user&id=<?php echo $value['id']; ?>" class="btn btn-success btn-mini">Edit</a>
                                            <a href="delete-user.php?id=<?php echo $value['id']; ?>" class="btn btn-danger btn-mini">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                        }}?>
                                </tbody>
                            </table>
                            <div class="row" style="margin-left: 18px;">
                                <ul class="pagination">
                                    <?php
                                        echo User::paginate("users.php?", $page, $totalResults, $resultsPerPage, 1);
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
    <!--Footer-part-->
    <div class="row-fluid">
        <div id="footer" class="span12"> 2021 &copy; TDC - Lập trình web 1</div>
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