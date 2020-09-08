<div class="box">
    <center>
        <h1>Do really want to delet your account</h1>
        <form action="" method="post">
            <input type="submit" value="Yes, I Want To Delete" name="yes" class="btn btn-danger">
            <input type="submit" value="No, I Don't Want" name="no" class="btn btn-primary">
        </form>
    </center>
</div>
<?php
$customer_phone = $_SESSION['customer_phone'];
if (isset($_POST['yes'])) {
    $delete = "DELETE FROM `customers` WHERE `customer_contect`='$customer_phone'";
    $run_q = mysqli_query($con, $delete);
    if ($run_q) {
        session_destroy();
        echo "<script>alert('your account id deleted');</script>";
        echo "<script>window.open('../','_self');</script>";
    }
}
?>