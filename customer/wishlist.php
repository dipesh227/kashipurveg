<div class="box">
    <form action="cart.php" method="post" enctype="multipart/form-data">
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
                <a href="../index.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Countinue Shopping</a>
            </div>
            <div class="pull-right">
                <a href="../cart.php" class="btn btn-primary">
                    Proceed TO Checkout <i class="fa fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </form>
</div>