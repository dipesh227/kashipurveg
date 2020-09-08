<?php
define('TITLE', 'home');
include('includes/header.php'); ?>
<!-- slaider start -->
<div class="container-fluid" id="slider">
    <div class="col-md-12">
        <!-- outre start slaider -->
        <div class="carousel slide" id="myCarousel" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="myCarousel" data-slide-to="0" class="action active"></li>
                <li data-target="myCarousel" data-slide-to="1" class=""></li>
                <li data-target="myCarousel" data-slide-to="2" class=""></li>
                <li data-target="myCarousel" data-slide-to="3" class=""></li>
            </ol>
            <!-- inner start slaider -->
            <div class="carousel-inner">
                <?php
                $get_sider = "SELECT * FROM slider limit 0,1";
                $run_sider = mysqli_query($con, $get_sider);
                while ($row = mysqli_fetch_array($run_sider)) {
                    $silder_name = $row[1];
                    $silder_image = $row[2];
                    echo "
                        <div class='item active'>
                            <img src='admin_area/slider_images/$silder_image'>
                        </div>
                    ";
                }
                ?>
                <?php
                $get_sider = "SELECT * FROM slider limit 1,3";
                $run_sider = mysqli_query($con, $get_sider);
                while ($row = mysqli_fetch_array($run_sider)) {
                    $silder_name = $row[1];
                    $silder_image = $row[2];
                    echo "
                        <div class='item'>
                            <img src='admin_area/slider_images/$silder_image'>
                        </div>
                    ";
                }
                ?>
            </div>
            <!-- inner end slaider -->
            <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a href="#myCarousel" class="right carousel-control" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">next</span>
            </a>
        </div>
        <!-- outer end slaider -->
    </div>
</div>
<!-- slaider end -->
<!-- start advantage -->
<div id="advantage">
    <!-- start container -->
    <div class="container-fluid">
        <!-- start same height -->
        <div class="same-height-row">
            <!-- col-sm-4 start -->
            <div class="col-sm-4">
                <!-- start same height box -->
                <div class="box same-height">
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                    </div>
                    <h3><a href="#">BEST PRICES</a></h3>
                    <P>You can check all others sites about the prices and then compare with us.</P>
                </div>
                <!-- close same height box -->
            </div>
            <!-- close col-sm-4 -->
            <!-- col-sm-4 start -->
            <div class="col-sm-4">
                <!-- start same height box -->
                <div class="box same-height">
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                    </div>
                    <h3><a href="#">100% SATISFACATION GUARANTEED FROM US</a></h3>
                    <P>Free return on everything for 3 months</P>
                </div>
                <!-- close same height box -->
            </div>
            <!-- close col-sm-4 -->
            <!-- col-sm-4 start -->
            <div class="col-sm-4">
                <!-- start same height box -->
                <div class="box same-height">
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                    </div>
                    <h3><a href="#">WE LOVE OUR CUSTOMERS</a></h3>
                    <P>We known to provide best possibel servicr ever</P>
                </div>
                <!-- close same height box -->
            </div>
            <!-- close col-sm-4 -->
        </div>
        <!-- close same height row -->
    </div>
    <!-- close container -->
</div>
<!-- close advantage -->
<!-- start hot -->
<div id="hotbox">
    <div class="box">
        <div class="container">
            <div class="col-md-12">
                <h2>Latest this week</h2>
            </div>
        </div>
    </div>
</div>
<!-- end hot -->
<!-- containt -->
<div class="container" id="content">
    <div class="row">
        <!-- product start -->
        <?php

        getpro(); ?>

        <!-- product close -->
    </div>

</div>

<!-- footer start-->
<?php include('includes/footer.php') ?>