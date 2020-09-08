<?php
define('TITLE', 'shopcart');
include('includes/header.php'); 
echo @update_cart();?>

<div id="content">
    <!-- container start -->
    <div class="container-fluid">
        <!-- col-md-12 start -->
        <div class="col-md-12">
            <!-- breadcoumb start -->
            <ul class="breadcrumb">
                <li><a href="./">Home</a></li>
                <li>Cart</li>
            </ul>
            <!-- breadcoumb close -->
        </div>
        <!-- col-md-12 end -->
        <!-- col-md-9 mianpart cart start -->
        <div class="col-md-9" id="cart">
            <div class="box">
                <form action="cart" method="post" enctype="multipart/form-data">
                    <h1>Sopping Cart</h1>
                    <?php
                    $ip_add = get_user_id();
                    $select_cart = "SELECT * FROM `cart` WHERE ip_add='$ip_add'";
                    $run_cart = mysqli_query($con, $select_cart);
                    $count = mysqli_num_rows($run_cart);
                    ?>
                    <p class="text-muted">Currently You Have <?php item(); ?> Item In Your Cart</p>
                    <!-- soping cart table start -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Size</th>
                                    <th>Delete</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totale = 0;
                                while ($row_cart_item = mysqli_fetch_array($run_cart)) {
                                    $pro_id = $row_cart_item[0];
                                    $pro_qty = $row_cart_item[2];
                                    $pro_size = $row_cart_item[3];
                                    $select_pro = "SELECT * FROM `products` WHERE product_id='$pro_id'";
                                    $run_pro = mysqli_query($con, $select_pro);
                                    while ($row_pro_item = mysqli_fetch_array($run_pro)) {
                                        $p_title = $row_pro_item[4];
                                        $p_img1 = $row_pro_item[5];
                                        $p_price = $row_pro_item[8];
                                        $p_title = $row_pro_item[4];
                                        $sub_totale = $p_price * $pro_qty;
                                        $totale += $sub_totale;
                                ?>
                                        <tr>
                                            <td class="text-center"><img src="admin_area/prouduct_img/<?php echo $p_img1; ?>" class="img-responsive" alt=""></td>
                                            <td> <?php echo $p_title; ?></td>
                                            <td><?php echo $pro_qty; ?></td>
                                            <td>INR <?php echo $p_price; ?></td>
                                            <td><?php echo $pro_size; ?></td>
                                            <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                                            <td>INR <?php echo $sub_totale; ?></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="6">Total</th>
                                    <th colspan="2">INR <?php echo $totale; ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- sopping cart table end -->
                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="./" class="btn btn-default"><i class="fa fa-chevron-left"></i> Countinue Shopping</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" name="update" value="update" class="btn btn-default"><i class="fa fa-refresh"></i> Update Cart</button>
                            <a href="checkout" class="btn btn-primary">
                                Proceed TO Checkout <i class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            function update_cart()
            {
                global $con;
                if (isset($_POST['update'])) {
                    foreach ($_POST['remove'] as $remove_id) {
                        $delete_product = "DELETE FROM cart WHERE p_id='$remove_id'";
                        $run_pro_del = mysqli_query($con, $delete_product);
                        if ($run_pro_del) {
                            echo "
                            <script>window.open('cart','_self');</script>
                            ";
                        }
                    }
                }
            }
            ?>
            <!-- row start -->
            <div class="row same-height-row">
                <!-- col-md-12 col-sm-6 start -->
                <div class="col-md-12 col-sm-6">
                    <!-- heading start -->
                    <div class="box same-height headline">
                        <h3 class="text-center">You Also Like These Products</h3>
                    </div>
                    <!-- heading close -->
                </div>
                <!-- col-md-12 col-sm-6 end -->
                <?php getreletivepro(); ?>
                <!-- center-responsive col-md-3 end -->
            </div>
            <!-- row close -->
        </div>
        <!-- col-md-9 main part cart close -->
        <!-- col-md-3 summry cart close -->
        <div class="col-md-3">
            <div class="box" id="order-summary">
                <div class="box-header ">
                    <h3>Order Summary</h3>
                </div>
                <p class="text-muted ">
                    Shipping and aditional costs are calculated based on the valuse you have entered
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Order Subtotal</td>
                                <th>INR <?php echo $totale; ?></th>
                            </tr>
                            <tr>
                                <td>Shipping And Handling</td>
                                <td>INR 0</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>INR 0</td>
                            </tr>
                            <tr class="total">
                                <th>Total</th>
                                <th>INR <?php echo $totale; ?></th>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- col-md-3 summry cart end -->
    </div>
    <!-- container close -->
</div>
<!-- content close -->
<?php include('includes/footer.php') ?>