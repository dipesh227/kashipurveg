<div class="box">
    <center>
        <h1>
            My Order
        </h1>
        <p>If you have any question please feel free to <a href="../contect">contect us</a> ,our Customer Service Center is working for 24/7.</p>
    </center>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Due Amount</th>
                    <th>Invoice Number</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Order Date</th>
                    <th>Paid/Unpaid</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $customer_phone = $_SESSION['customer_phone'];
                $get_cust = "SELECT * FROM `customers` WHERE `customer_contect`='$customer_phone'";
                $run_cust = mysqli_query($con, $get_cust);
                $customer_row = mysqli_fetch_array($run_cust);
                $cust_id = $customer_row[0];
                $get_order = "SELECT * FROM `customer_order` WHERE `customer_id`='$cust_id'";
                $run_order = mysqli_query($con, $get_order);
                $i = 1;
                while ($order_row = mysqli_fetch_array($run_order)) {
                    if($order_row[7]=='panding'){
                        $order_stetus='unpaid';
                    }else{
                        $order_stetus='paid';
                    }
                ?>
                    <tr>
                        <td>#<?php echo $i; ?></td>
                        <td>INR <?php echo $order_row[2]; ?></td>
                        <td><?php echo $order_row[3]; ?></td>
                        <td><?php echo $order_row[4]; ?></td>
                        <td><?php echo $order_row[5]; ?></td>
                        <td><?php echo substr($order_row[6],0,11); ?></td>
                        <td><?php echo $order_stetus ; ?></td>
                        <td><a href="confirm?order_id=<?php echo $order_row[0]; ?>" class="btn btn-primary btn-sm"> Confirm if Paid</a></td>
                    </tr>
                <?php $i++;} ?>
            </tbody>
        </table>
    </div>
</div>