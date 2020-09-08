<?php
define('TITLE', 'myaccount');
include('includes/header.php');
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
}

if (isset($_POST['confirm_pament'])) {
    $update_id = $_GET['update_id'];
    $invoice_no = $_POST['invoice_number'];
    $ammount = $_POST['ammount'];
    $payment_mode = $_POST['payment_mode'];
    $transection_number = $_POST['transection_number'];
    $date = $_POST['date'];
    $complete = 'complete';
    $insert = "INSERT INTO `payment`(`invoice_id`, `amounts`, `payment_mode`, `ref_no`, `payment_date`) VALUES ('$invoice_no','$ammount','$payment_mode','$transection_number','$date')";
    $run_insert = mysqli_query($con, $insert);
    $update_q = "UPDATE `customer_order` SET `order_status`='$complete' WHERE `order_id`='$update_id'";
    $run_update = mysqli_query($con, $update_q);
    $update_p = "UPDATE `panding_order` SET `order_states`='$complete' WHERE `order_id`='$update_id'";
    $run_p_update = mysqli_query($con, $update_p);
    echo "<script>alert('Your peyment is recived');</script>";
    echo "<script>window.open('./my_account.php?my_order','_self');</script>";
}
?>
<div id="content">
    <!-- container start -->
    <div class="container">
        <!-- col-md-12 start -->
        <div class="col-md-12">
            <!-- breadcoumb start -->
            <ul class="breadcrumb">
                <li><a href="../index.php">Home</a></li>
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
            <div class="box">
                <h1 class="text-center">Please Confirm Your Payment</h1>
                <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post">
                    <?php
                    $get_order = "SELECT * FROM `customer_order` WHERE `order_id`='$_GET[order_id]'";
                    $run_order = mysqli_query($con, $get_order);
                    $order_row = mysqli_fetch_array($run_order)
                    ?>
                    <div class="form-group">
                        <label for="">Invocie Number</label>
                        <input type="text" name="invoice_number" class="form-control" value="<?php echo $order_row[3]; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Ammount</label>
                        <input type="text" name="ammount" class="form-control" value="<?php echo $order_row[2]; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Select Input Mode</label>
                        <select name="payment_mode" class="form-control">
                            <option value="Select Option">Select Option</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Paypal">Paypal</option>
                            <option value="PayuMoney">PayuMoney</option>
                            <option value="">paytm</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Transection Number</label>
                        <input type="text" name="transection_number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Payment Date</label>
                        <input type="text" name="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" readonly>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="confirm_pament" class="btn btn-primary btn-lg"> Confirm Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- container close -->
</div>
<!-- content close -->
<?php include('includes/footer.php') ?>