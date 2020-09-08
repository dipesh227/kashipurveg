<?php

define('TITLE', 'checkout');
include('includes/header.php');
if (!isset($_SESSION['customer_phone'])) {
    echo "<script>window.open('login.php?check','_self');</script>";
}
?>

<!-- content start -->
<div id="content">
    <!-- container start -->
    <div class="container">
        <!-- col-md-12 start -->
        <div class="col-md-12">
            <!-- breadcoumb start -->
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>Checkout</li>
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
            <div class="box">
                <h2 class="text-center">Payment Option For You</h2>
                <p class="lead text-center">Select Any one</p>
                <?php
                $com_phone = $_SESSION['customer_phone'];
                $select_customer = "SELECT * FROM `customers` WHERE `customer_contect`='$com_phone'";
                $run_cust = mysqli_query($con, $select_customer);
                $customer_row = mysqli_fetch_array($run_cust);
                $cust_id = $customer_row[0];
                ?>
                <center>
                    <p class="lead">
                        <a href="order.php?c_id=<?php echo $cust_id;?>">
                            <h3>Pay offline <i class="fa fa-ofline"></i></h3>
                        </a>
                        <a href="#">
                            <h3>Pay with PayPal <i class="fa fa-paypal"></i></h3>
                        </a>
                    </p>
                </center>
            </div>
        </div>
        <!-- container close -->
    </div>
    <!-- content close -->


    <?php include('includes/footer.php') ?>