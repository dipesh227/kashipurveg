<?php
define('TITLE', 'contectus');
include('includes/header.php'); ?>
<div id="content">
    <!-- container start -->
    <div class="container">
        <!-- col-md-12 start -->
        <div class="col-md-12">
            <!-- breadcoumb start -->
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>Contect Us</li>
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
                        <h2>Contect Us</h2>
                        <p class="text-muted">
                            If you have any question please feel free to contect us ,our Customer Service Center is working for 24/7.
                        </p>
                    </center>
                </div>
                <!-- header close -->
                <form action="contect.php" method="post">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="">Subject</label>
                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <label for="">Massage</label>
                        <textarea name="message" id="message" class="form-control" placeholder="Mesage"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa fa-user-md"></i>Send Message
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
    $sender_name = $_POST['name'];
    $sender_email = $_POST['email'];
    $sender_sub = $_POST['subject'];
    $sender_mesg = $_POST['message'];
    $recveriverEemail="dipeshjoshi227@gmail.com";
    mail($recveriverEemail,$sender_name,$sender_sub,$sender_mesg,$sender_email);
    // send to custemur
    $subject="Welcome To Our Website";
    $message="I Shall get you Soon thanks for sending emaill";
    mail($sender_email,$subject,$message,$recveriverEemail);
    echo"<script>alert('Message Sent SeccessFully');</script>";
}
?>