<?php
define('TITLE', 'myaccount');
include('includes/header.php');
if (!isset($_SESSION['customer_phone'])) {
    echo "<script>window.open('../login?myacc','_self');</script>";
} ?>
<div id="content">
    <!-- container start -->
    <div class="container">
        <!-- col-md-12 start -->
        <div class="col-md-12">
            <!-- breadcoumb start -->
            <ul class="breadcrumb">
                <li><a href="../">Home</a></li>
                <li>My Account</li>
            </ul>
            <!-- breadcoumb close -->
        </div>
        <!-- col-md-12 end -->
        <!-- sider start -->
        <div class="col-md-3">
            <?php include('includes/sidebar.php'); ?>
        </div>
        <!-- sidebar close -->
        <div class="col-md-9">
            <?php
            if (isset($_GET['my_order'])) {
                include('my_order');
            }
            if (isset($_GET['pay_ofline'])) {
                include("pay_ofline");
            }
            if (isset($_GET['edit_act'])) {
                include("edit_act");
            }
            if (isset($_GET['change_pass'])) {
                include("change_pass");
            }
            if (isset($_GET['my_wishlist'])) {
                include("wishlist");
            }
            if (isset($_GET['del_acount'])) {
                include("del_acount");
            }
            ?>
        </div>
    </div>
    <!-- container close -->
</div>
<!-- content close -->
<?php include('includes/footer.php') ?>