<?php
define('TITLE', 'shop');
include('includes/header.php'); ?>
<!-- content start -->
<div id="content">
    <!-- container start -->
    <div class="container">
        <!-- col-md-12 start -->
        <div class="col-md-12">
            <!-- breadcoumb start -->
            <ul class="breadcrumb">
                <li><a href="./">Home</a></li>
                <li>Shop</li>
            </ul>
            <!-- breadcoumb close -->
        </div>
        <!-- col-md-12 end -->
        <!-- sider start -->
        <div class="col-md-3">
            <?php include('includes/sidebar.php'); ?>
        </div>
        <!-- sidebar close -->
        <!-- start section -->
        <div class="col-md-9">
            <?php
            if (!isset($_GET['p_cat'])) {
                if (!isset($_GET['cat_id'])) {
                    direct_shop();
                }
            }
            getpcatprodispay();
            getcatdispay();
            ?>
        </div>
        <!-- end section -->
    </div>
    <!-- container close -->
</div>
<!-- content close -->


<?php include('includes/footer.php') ?>