<?php
session_start();
include('includes/connection.php');
include('function/function.php');
if (isset($_GET['c_id'])) {
    $c_id = $_GET['c_id'];
}
$ip_add = get_user_id();
$status = "panding";
$invaice_no = mt_rand();
$select_cart = "SELECT * FROM `cart` WHERE `ip_add` ='$ip_add'";
$run_cart = mysqli_query($con, $select_cart);
while ($row_cart = mysqli_fetch_array($run_cart)) {
    $pro_id = $row_cart[0];
    $pro_qty = $row_cart[2];
    $pro_size = $row_cart[3];
    $select_pro = "SELECT * FROM `products` WHERE `product_id` ='$pro_id'";
    $run_pro = mysqli_query($con, $select_pro);
    while ($row_pro = mysqli_fetch_array($run_pro, MYSQLI_BOTH)) {
        $sub_total = $row_pro[8] * $pro_qty;
        $insert_order = "INSERT INTO `customer_order`( `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES ('$c_id','$sub_total','$invaice_no','$pro_qty','$pro_size',now(),'$status')";
        $run_insert = mysqli_query($con, $insert_order);
        $insert_panding = "INSERT INTO `panding_order`( `customer_id`, `prodect_id`,`invoice_no`, `qty`, `size`, `order_states`) VALUES ('$c_id','$pro_id','$invaice_no','$pro_qty','$pro_size','$status')";
        $run_pend_insert = mysqli_query($con, $insert_panding);
        $delete_cart = "DELETE FROM `cart` WHERE `ip_add` ='$ip_add'";
        $run_del = mysqli_query($con, $delete_cart);
?>
        <script>
            alert('Your order has been submiited, Thanks');
            window.open('customer/my_account?my_order', '_self');
        </script>
<?php
    }
}
if (!isset($pro_id)) {
    echo "
        <script>
        window.open('customer/my_account?my_order','_self');
        </script>
    ";
}
?>