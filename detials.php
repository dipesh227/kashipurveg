<?php
define('TITLE', 'shop');
include('includes/header.php');
add_to_cart();
if (isset($_GET['pro_id'])) {
    $pro_id = $_GET['pro_id'];
    $get_prodect = "SELECT * FROM `products` WHERE product_id='$pro_id'";
    $run_proudect = mysqli_query($con, $get_prodect);
    $row = mysqli_fetch_array($run_proudect);
    $p_cat_id = $row[1];
    $p_title = $row[4];
    $p_price = $row[8];
    $p_desc = $row[9];
    $p_img1 = $row[5];
    $p_img2 = $row[6];
    $p_img3 = $row[7];
    $get_p_cat = "SELECT * FROM `product_categories` WHERE p_cat_id='$p_cat_id'";
    $run_p_cat = mysqli_query($con, $get_p_cat);
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    $p_cat_title = $row_p_cat[1];
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
                <li><a href="shop.php">Shop </a></li>
                <li><a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a> </li>
                <li><?php echo $p_title; ?></li>
            </ul>
            <!-- breadcoumb close -->
        </div>
        <!-- col-md-12 end -->
        <!-- sider start -->
        <div class="col-md-3">
            <?php include('includes/sidebar.php'); ?>
        </div>
        <!-- sidebar close -->
        <!-- start section -->
        <div class="col-md-9">
            <!-- row start -->
            <div class="row" id="prouductmain">
                <!-- colo-sm-6 start -->
                <div class="col-sm-6">
                    <!-- miniimage start -->
                    <div id="mainimage">
                        <!-- slider start -->
                        <div id="mycarousel" class="carousel slide" data-ride="carousel">
                            <!-- indicator stsrt -->
                            <ol class="carousel-indicators">
                                <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#mycarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <!-- indecator end -->
                            <!-- inner start -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <center>
                                        <img src="admin_area/prouduct_img/<?php echo $p_img1 ?>" class="img-responsive">
                                    </center>
                                </div>
                                <div class="item ">
                                    <center>
                                        <img src="admin_area/prouduct_img/<?php echo $p_img2 ?>" class="img-responsive">
                                    </center>
                                </div>
                                <div class="item ">
                                    <center>
                                        <img src="admin_area/prouduct_img/<?php echo $p_img3 ?>" class="img-responsive" alt="">
                                    </center>
                                </div>
                            </div>
                            <!-- inner end -->
                            <a class="left carousel-control" href="#mycarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#mycarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">next</span>
                            </a>
                        </div>
                        <!-- slider end -->
                    </div>
                    <!-- miniimage end -->
                </div>
                <!-- col-sm-6 end -->
                <div class="col-sm-6">
                    <!-- box start -->
                    <div class="box">
                        <h1 class="text-center"><?php echo $p_title ?></h1>
                        <!-- form start -->
                        <form action="detials.php?add_cart=<?php echo $pro_id; ?>" method="post" class="form-horizontal">
                            <!-- form qty start -->
                            <div class="form-group">
                                <label for="productquntity" class="col-md-5 control-label">Product Quantity</label>
                                <div class="col-md-7">
                                    <select name="product_qty" id="product_qty" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <!-- form qty end -->
                            <!-- form qty start -->
                            <div class="form-group">
                                <label for="productquntity" class="col-md-5 control-label">Product Quantity</label>
                                <div class="col-md-7">
                                    <select name="product_size" id="product_size" class="form-control">
                                        <option value="1">Select Size</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <!-- form qty end -->
                            <p class="price">INR <?php echo $p_price ?></p>
                            <p class="text-center button">
                                <button class="btn btn-primary" type="submit" name="add_cart"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
                            </p>
                        </form>
                        <!-- form end -->
                    </div>
                    <!-- box end -->
                    <!-- thumb start -->
                    <div class="col-xs-4">
                        <a href="#" class="thumb">
                            <img src="admin_area/prouduct_img/<?php echo $p_img1 ?>" alt="" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="#" class="thumb">
                            <img src="admin_area/prouduct_img/<?php echo $p_img2 ?>" alt="" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="#" class="thumb">
                            <img src="admin_area/prouduct_img/<?php echo $p_img3 ?>" alt="" class="img-responsive">
                        </a>
                    </div>
                    <!-- thumb end -->
                </div>
                <!-- col-md-6 end -->
            </div>
            <!-- row end -->
            <!-- deiscription section start -->
            <div class="box" id="detials">
                <h4>Prodect Discription</h4>
                <p><?php echo $p_desc ?></p>
                <h4>Diffrnt Lanugage Name</h4>
                <ul>
                    <li>a</li>
                    <li>a</li>
                    <li>a</li>
                    <li>a</li>
                    <li>a</li>
                </ul>
            </div>
            <!-- deiscription section end -->
            <!-- row start -->
            <div class="row same-height-row">
                <!-- col-md-12 col-sm-6 start -->
                <div class="col-md-12 col-sm-6">
                    <!-- heading start -->
                    <div class="box same-height headline">
                        <h3 class="text-center">You Also Like These Products</h3>
                    </div>
                    <!-- heading close -->
                </div>
                <!-- col-md-12 col-sm-6 end -->
                <!-- center-responsive col-md-3 start -->
                <?php getreletivepro(); ?>
                <!-- center-responsive col-md-3 end -->
            </div>
            <!-- row close -->
        </div>
        <!-- end section -->
    </div>
    <!-- container close -->
</div>
<!-- content close -->

<?php include('includes/footer.php') ?>