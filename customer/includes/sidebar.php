<!-- panel panel-default sidebar-menu start -->
<div class="panel panel-default sidebar-menu">
    <!-- penal heading start -->
    <div class="panel-heading">
        <?php 
            $customer_phone=$_SESSION['customer_phone'];
            $get_cust="SELECT * FROM `customers` WHERE `customer_contect`='$customer_phone'";
            $run_cust = mysqli_query($con, $get_cust);
            $customer_row = mysqli_fetch_array($run_cust);
            $cust_image = $customer_row[8];
            $cust_name = $customer_row[1];
        ?>
        <center>
            <img src="customer_images/<?php echo $cust_image;?>" class="img-responsive" alt="">
        </center>
        <br>
        <h3 align="center" class="panel-title">Name: <?php echo $cust_name;?></h3>
    </div>
    <!-- penal heading end -->
    <!-- panel body start -->
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu">
            <li class="<?php if (isset($_GET['my_order'])) {
                            echo "active";
                        } ?>">
                <a href="my_account?my_order"><i class="fa fa-list"></i> My Order</a>
            </li>
            <li class="<?php if (isset($_GET['pay_ofline'])) {
                            echo "active";
                        } ?>">
                <a href="my_account?pay_ofline"><i class="fa fa-bolt"></i> Pay Ofline</a>
            </li>
            <li class="<?php if (isset($_GET['my_address'])) {
                            echo "active";
                        } ?>">
                <a href="my_account?my_address"><i class="fa fa-user"></i> My Adderss</a>
            </li>
            <li class="<?php if (isset($_GET['edit_act'])) {
                            echo "active";
                        } ?>">
                <a href="my_account?edit_act"><i class="fa fa-pencil"></i> Edit Account</a>
            </li>
            <li class="<?php if (isset($_GET['change_pass'])) {
                            echo "active";
                        } ?>">
                <a href="my_account?change_pass"><i class="fa fa-user"></i> Change Password</a>
            </li>
            <li class="<?php if (isset($_GET['my_wishlist'])) {
                            echo "active";
                        } ?>">
                <a href="my_account?my_wishlist"><i class="fa fa-bolt"></i> My Wishlist</a>
            </li>
            <li class="<?php if (isset($_GET['del_acount'])) {
                            echo "active";
                        } ?>">
                <a href="my_account?del_acount"><i class="fa fa-trace"></i> Delete Account</a>
            </li>
            <li class="<?php if (isset($_GET['logout'])) {
                            echo "active";
                        } ?>">
                <a href="my_account?logout"><i class="fa fa-sign-out"></i> Logout</a>
            </li>


        </ul>
    </div>
    <!-- panel body close -->
</div>
<!-- panel panel-default sidebar-menu start -->