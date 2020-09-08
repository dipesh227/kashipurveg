<div class="box">
    <center>
        <h1>Change Password Here</h1>
    </center>
    <form action="" method="post">
        <div class="form-group">
            <label for="">Enter your Cuerrnt password</label>
            <input type="password" name="old_pass" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Enter new password</label>
            <input type="password" name="new_pass" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Enter Confirm New password</label>
            <input type="password" name="c_n_pass" class="form-control" id="">
        </div>
        <div class="text-center">
            <button class="btn btn-primary btn-lg" name="update">
                Update Now
            </button>
        </div>
    </form>
</div>
<?php
if (isset($_POST['update'])) {
    $customer_phone = $_SESSION['customer_phone'];
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $c_n_pass = $_POST['c_n_pass'];
    $select_pass="SELECT * FROM `customers` WHERE `customer_pass`='$old_pass' and `customer_contect`='$customer_phone'";
    $run_q=mysqli_query($con,$select_pass);
    $check_old_pass=mysqli_num_rows($run_q);
    if($check_old_pass==0){
        echo "<script>alert('old password not match');</script>";
        exit();
    }
    if($new_pass!=$c_n_pass){
        echo "<script>alert('new password not mach to confirm password');</script>";
        exit();
    }
    $update_q="UPDATE `customers` SET `customer_pass`='$new_pass' WHERE `customer_contect`='$customer_phone'";
    $run_update=mysqli_query($con,$update_q);
    echo "<script>alert('password change');</script>";
        
}
?>