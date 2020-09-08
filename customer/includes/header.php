<?php
session_start();
include('../includes/connection.php');
include('../function/function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- custem css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="./images/fevicon.png" > 
    <title>Veg Store</title>
</head>

<body>
    <!-- top bar Start -->
    <div id="top">
        <!-- container bar Start left-->
        <div class="container-fluid ">
            <!--row start-->
            <div class="row">
                <!-- col-md-6 start-->
                <div class="col-md-6 offer">
                    <a href="my_account" class="btn btn-success btn-sm">
                        <?php
                        if (!isset($_SESSION['customer_phone'])) {
                            echo 'Welcome Gest';
                        } else {
                            echo "Welcome : " . $_SESSION['customer_name'] . "";
                        }
                        ?>
                    </a>
                    <a href="../cart">Sopping Cart Total Price: INR <?php total_price(); ?>, Total Items <?php item(); ?></a>
                </div>
                <!-- col-md-6 end left-->
                <!-- col-md-6 start right-->
                <div class="col-md-6 ">
                    <ul class="menu">
                        <?php
                        if (!isset($_SESSION['customer_phone'])) {
                            echo '
                            <li>
                            <a href="../customer_registration">Register</a>
                            </li>
                            ';
                        }
                        ?>
                        <li><a href="my_account">My Account</a></li>
                        <li><a href="../cart">Goto Cart</a></li>
                        <li>
                            <?php
                            if (!isset($_SESSION['customer_phone'])) {
                                echo '<a href="../checkout">Login</a>';
                            } else {
                                echo "<a href='../logout'>Logout</a>";
                            }
                            ?>
                        </li>
                    </ul>
                </div>
                <!-- col-md-6 end right-->
            </div>
            <!--row start-->
        </div>
        <!-- container bar end -->
    </div>
    <!-- top bar end -->
    <!-- nav bar start -->
    <div class="navbar navbar-default navbar-fixed" id="navbar">
        <div class="container-fluid">
            <!-- navbar logo start -->
            <div class="navbar-header">
                <a href="../" class="navbar-brand home">
                    <img src="../img/logo.png" alt="KashipurVegStore" class="hidden-xs" />
                    <img src="../img/logo.png" alt="KashipurVegStore" class="visible-xs" />
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nevigetion">
                    <span class="sr-only">Toggle Navigetion</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#searchmob">
                    <span class="sr-only"></span>
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <div class="collapse clearfix" id="searchmob">
                <form action="../result" method="get" class="navbar-form">
                    <div class="input-group">
                        <input type="text" name="user_query" placeholder="Search" class="form-control" required>
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" value="search" name="search">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
            <!-- navabr logo end -->
            <!-- navabr menu start -->
            <div class="navbar-collapse collapse" id="nevigetion">
                <!-- padding nav start -->
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="<?php if (TITLE == 'home') {
                                        echo 'active';
                                    } ?>">
                            <a href="../" class="">Home</a>
                        </li>
                        <li class="<?php if (TITLE == 'shop') {
                                        echo 'active';
                                    } ?>">
                            <a href="../shop" class="">Shop</a>
                        </li>
                        <li class="<?php if (TITLE == 'myaccount') {
                                        echo 'active';
                                    } ?>">
                            <a href="my_account" class="">My Account</a>
                        </li>
                        <li class="<?php if (TITLE == 'shopcart') {
                                        echo 'active';
                                    } ?>">
                            <a href="../cart" class="">Shopping Cart</a>
                        </li>
                        <li class="<?php if (TITLE == 'about') {
                                        echo 'active';
                                    } ?>">
                            <a href="../about" class="">About Us</a>
                        </li>
                        <li class="<?php if (TITLE == 'sevices') {
                                        echo 'active';
                                    } ?>">
                            <a href="../sevices" class="">Sevices</a>
                        </li>
                        <li class="<?php if (TITLE == 'contectus') {
                                        echo 'active';
                                    } ?>">
                            <a href="../contect" class="">Contect Us</a>
                        </li>
                    </ul>
                </div>
                <!-- padding nav end -->
                <!-- cart start -->
                <a href="../cart" class="btn btn-primary navbar-btn right">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php item(); ?> items In Cart</span>
                </a>
                <!-- cart end -->
                <!-- search stat -->
                <div class="navbar-collapse collapse-right">
                    <button style="margin-left: 10px;" class="btn navbar-btn btn-primary " type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <!-- search end -->
                <div class="collapse clearfix" id="search">
                    <form action="../result" method="get" class="navbar-form">
                        <div class="input-group">
                            <input type="text" name="user_query" placeholder="Search" class="form-control" required>
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit" value="search" name="search">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- navabr menu end -->
        </div>
    </div>
    <!-- navbar end -->