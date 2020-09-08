<?php
define('TITLE', 'login');
include('includes/header.php');
if (isset($_SESSION['customer_phone'])) {
    echo "<script>window.open('customer/my_account','_self');</script>";
}
?>

<!-- content start -->
<div id="content">
    <!-- container start -->
    <div class="container-fluid">
        <!-- col-md-12 start -->
        <div class="col-md-12">
            <!-- breadcoumb start -->
            <ul class="breadcrumb">
                <li><a href="./">Home</a></li>
                <li>Login</li>
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
                <div class="box-header">
                    <center>
                        <h2>Login</h2>
                        <p class="lead">Alredy Our Customer</p>
                    </center>
                </div>
                <?php
                if (isset($_GET['check'])) {
                    echo '
                <form action="login?check" method="post">
                    <div class="form-group">
                        <label for=""> Customer Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label for="">Customer Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa fa-sign-in"></i> Login
                        </button>
                    </div>
                </form>';
                } else {
                    if (isset($_GET['myacc'])) {
                        echo '
                <form action="login?myacc" method="post">
                    <div class="form-group">
                        <label for=""> Customer Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label for="">Customer Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa fa-sign-in"></i> Login
                        </button>
                    </div>
                </form>';
                    } else {
                        echo '
                <form action="login" method="post">
                    <div class="form-group">
                        <label for=""> Customer Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label for="">Customer Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa fa-sign-in"></i> Login
                        </button>
                    </div>
                </form>';
                    }
                }
                ?>
                <center>
                    <a href="customer_registration">
                        <h3>New ? Register Here</h3>
                    </a>
                </center>
            </div>
        </div>
    </div>
    <!-- container close -->
</div>
<!-- content close -->


<?php include('includes/footer.php');
if (isset($_POST['submit'])) {
    $c_phone = $_POST['phone'];
    $c_password = $_POST['password'];
    $check_data = "SELECT * FROM `customers` WHERE `customer_contect`='$c_phone' AND `customer_pass`='$c_password'";
    $run_login = mysqli_query($con, $check_data);
    if (mysqli_num_rows($run_login) > 0) {
        if ($row_log = mysqli_fetch_array($run_login)) {
            $_SESSION['customer_phone'] = $c_phone;
            $_SESSION['customer_name'] = $row_log[1];
            $get_ip = get_user_id();
            $select_cart = "SELECT * FROM `cart` WHERE ip_add='$get_ip'";
            $run_cart = mysqli_query($con, $select_cart);
            if (mysqli_num_rows($run_cart) > 0) {
                if (isset($_GET['check'])) {
                    echo "<script>window.open('checkout','_self');</script>";
                }
                if (isset($_GET['myacc'])) {
                    echo "<script>window.open('customer/my_account','_self');</script>";
                }
            } else {
                if (isset($_GET['myacc'])) {
                    echo "<script>window.open('customer/my_account','_self');</script>";
                } else {
                    echo "<script>window.open('./','_self');</script>";
                }
            }
        }
    } else {
        echo "<script>alert('You Have Been Not Login Successfully');</script>";
    }
}
?>