<?php
$customer_phone = $_SESSION['customer_phone'];
$get_cust = "SELECT * FROM `customers` WHERE `customer_contect`='$customer_phone'";
$run_cust = mysqli_query($con, $get_cust);
$customer_row = mysqli_fetch_array($run_cust);
$cust_id = $customer_row[0];
$customer_image = $customer_row[8];
if (isset($_POST['update'])) {
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_state = $_POST['c_state'];
    $c_city = $_POST['c_city'];
    $c_Number = $_POST['c_Number'];
    $c_address = $_POST['c_address'];
    $image_name = $_FILES['c_image']['name'];
    $customer_image = $image_name;
    $image_tmp_name = $_FILES['c_image']['tmp_name'];
    unlink('customer_images/' . $customer_row[8]);
    $update_customer = "UPDATE `customers` SET `customer_name`='$c_name',`customer_email`='$c_email',`customer_sate`='$c_state',`customer_city`='$c_city',`customer_address`='$c_address',`customer_img`='$customer_image' WHERE `customer_contect`='$c_Number'";
    $run_cust = mysqli_query($con, $update_customer);
    move_uploaded_file($image_tmp_name, "customer_images/$image_name");
    echo "<script>window.open('./my_account.php','_self');</script>";
}
?>
<div class="box">
    <center>
        <h1>Edit Your Account Here</h1>
    </center>
    <form action="" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="">Customer Name</label>
            <input type="text" name="c_name" value="<?php echo $customer_row[1]; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Customer Email</label>
            <input type="email" name="c_email" value="<?php echo $customer_row[2]; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Customer state</label>
            <input type="text" name="c_state" value="<?php echo $customer_row[4]; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Customer City</label>
            <input type="text" name="c_city" value="<?php echo $customer_row[5]; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Customer Number</label>
            <input type="text" name="c_Number" value="<?php echo $customer_row[6]; ?>" class="form-control" readonly required>
        </div>
        <div class="form-group">
            <label for="">Customer Address</label>
            <input type="text" name="c_address" value="<?php echo $customer_row[7]; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <label for="">Customer Image</label>
                            <input type="file" name="c_image" value="<?php echo $customer_image; ?>" class="form-control">
                        </td>
                        <td>
                            <img src="customer_images/<?php echo $customer_image; ?>" height="200" width="200" alt="" class="img-responsive">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-primary" name="update">Update</button>
        </div>
    </form>
</div>