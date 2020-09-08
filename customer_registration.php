<?php
define('TITLE', 'home');
include('includes/header.php'); ?>
<div id="content">
    <!-- container start -->
    <div class="container">
        <!-- col-md-12 start -->
        <div class="col-md-12">
            <!-- breadcoumb start -->
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>Registeration</li>
            </ul>
            <!-- breadcoumb close -->
        </div>
        <!-- col-md-12 end -->
        <!-- sider start -->
        <div class="col-md-3">
            <?php include('includes/sidebar.php'); ?>
        </div>
        <!-- sidebar close -->
        <!-- col-md-9 start -->
        <div class="col-md-9">
            <!-- box start -->
            <div class="box">
                <!-- header start -->
                <div class="box-header">
                    <center>
                        <h2>Customer Registration</h2>
                    </center>
                </div>
                <!-- header close -->
                <form action="customer_registration.php" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for=""> Customer Name</label>
                        <input type="text" name="c_name" id="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for=""> Customer Email</label>
                        <input type="email" name="c_email" id="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="">Customer Password</label>
                        <input type="Password" name="c_password" id="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" name="c_c_password" id="c_password" class="form-control" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <label for="">State</label>
                        <input type="text" name="c_state" id="state" class="form-control" placeholder="State" required>
                    </div>
                    <div class="form-group">
                        <label for="">City</label>
                        <input type="text" name="c_city" id="city" class="form-control" placeholder="City" required>
                    </div>
                    <div class="form-group">
                        <label for="">Contect Number</label>
                        <input type="text" name="c_contect_number" id="contectnumber" class="form-control" placeholder="Contect Number" required>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name="c_address" id="address" class="form-control" placeholder="Address" required>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="c_image" id="image" class="form-control" placeholder="Image" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa fa-user-md"></i> Register
                        </button>
                    </div>
                </form>
            </div>
            <!-- box close -->
        </div>
        <!-- col-md-9 close -->
    </div>
    <!-- container close -->
</div>
<!-- content close -->
<?php include('includes/footer.php');
if (isset($_POST['submit'])) {
    $name = $_POST['c_name'];
    $email = $_POST['c_email'];
    $password = $_POST['c_password'];
    $c_password = $_POST['c_c_password'];
    $state = $_POST['c_state'];
    $city = $_POST['c_city'];
    $contect_numbe = $_POST['c_contect_number'];
    $address = $_POST['c_address'];
    $image_name = $_FILES['c_image']['name'];
    $image_tmp_name = $_FILES['c_image']['tmp_name'];
    $ip = get_user_id();

    $insert_cust = "INSERT INTO `customers`(`customer_name`, `customer_email`, `customer_pass`, `customer_sate`, `customer_city`, `customer_contect`, `customer_address`, `customer_img`, `customer_ip`) VALUES ('$name','$email','$password','$state','$city','$contect_numbe','$address','$image_name','$ip')";
    $run_cust = mysqli_query($con, $insert_cust);
    if ($run_cust) {
        move_uploaded_file($image_tmp_name, "customer/customer_images/$image_name");
        $sel_cart = "SELECT * FROM cart WHERE ip_add='$ip'";
        $run_cust_cart = mysqli_query($con, $sel_cart);
        if (mysqli_num_rows($run_cust_cart)>0) {
            $_SESSION['customer_phone']=$contect_numbe;
            $_SESSION['customer_name']=$name;
            echo"<script>alert('You Have Been Registerd Successfully');
            window.open('checkout.php','_self');
            </script>";
        }else {
            $_SESSION['customer_phone']=$contect_numbe;
            $_SESSION['customer_name']=$name;
            echo"<script>alert('You Have Been Registerd Successfully');
            window.open('index.php','_self');
            </script>";
        }
    }
}
?>