<?php
// $db = mysqli_connect("localhost", "root", "", "kashipurvegadda");
$db = mysqli_connect("bybwrw6uurgujryuwdyz-mysql.services.clever-cloud.com","uwb5jr3dsdzm2ole","mnVyapBrcKy3wH767Lp7","bybwrw6uurgujryuwdyz",3306);
// for user ip
function get_user_id()
{
    switch (true) {
        case (!empty($_SERVER['HTTP_X_REAL_IP'])):
            return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])):
            return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default:
            return $_SERVER['REMOTE_ADDR'];
    }
}
// end

function add_to_cart()
{
    global $db;
    if (isset($_GET['add_cart'])) {
        $ip_add = get_user_id();
        $p_id = $_GET['add_cart'];
        $check_pre_add = "SELECT * FROM `cart` WHERE ip_add='$ip_add' AND p_id='$p_id'";
        $run_chech = mysqli_query($db, $check_pre_add);
        if (mysqli_num_rows($run_chech) > 0) {
            echo "<script>alert('this prodect allredy  in cart')</script>";
            echo "<script>window.open('cart.php','_self');</script>";
        } else {
            if (!isset($_POST['product_qty']) && !isset($_POST['product_size'])) {
                $p_qyt = $p_size = 1;
            } else {
                $p_qyt = $_POST['product_qty'];
                $p_size = $_POST['product_size'];
            }
            $query = "INSERT INTO `cart`(`p_id`, `ip_add`, `qty`, `size`) VALUES ('$p_id','$ip_add','$p_qyt','$p_size')";
            $run_query = mysqli_query($db, $query);
            if ($run_query) {
                if ($p_qyt==1 && $p_size==1) {
                    echo "<script>alert('prodect is add to cart')</script>";
                    echo "<script>window.open('detials.php?pro_id=$p_id','_self');</script>";
                } else {
                    echo "<script>window.open('cart.php','_self');</script>";
                }
            } else {
                echo "<script>alert('this prodect not add to cart')</script>";
                echo "<script>window.open('detials.php?pro_id=$p_id','_self');</script>";
            }
        }
    }
}

// item count in cart
function item()
{
    global $db;
    $ip_add = get_user_id();
    $get_item = "SELECT * FROM `cart` WHERE `ip_add`='$ip_add'";
    $run_item = mysqli_query($db, $get_item);
    $count = mysqli_num_rows($run_item);
    echo $count;
}
// total price
function total_price()
{
    global $db;
    $ip_add = get_user_id();
    $total = 0;
    $select_cart = "SELECT * FROM `cart` WHERE `ip_add`='$ip_add'";
    $run_select_cart = mysqli_query($db, $select_cart);
    while ($record = mysqli_fetch_array($run_select_cart)) {
        $pro_id = $record[0];
        $pro_qty = $record[2];
        $run_price = "SELECT * FROM `products` WHERE `product_id`='$pro_id'";
        $run_select_price = mysqli_query($db, $run_price);
        while ($record_price = mysqli_fetch_array($run_select_price)) {
            $sub_total = $record_price[8] * $pro_qty;
            $total += $sub_total;
        }
    }
    echo $total;
}

function getpro()
{
    global $db;
    $get_prodect = "SELECT * FROM `products` ORDER BY `products`.`date` DESC LIMIT 0,6";
    $run_prodects = mysqli_query($db, $get_prodect);
    while ($row_prodect = mysqli_fetch_array($run_prodects)) {
        $pro_id = $row_prodect[0];
        $pro_title = $row_prodect[4];
        $pro_price = $row_prodect[8];
        $pro_img1 = $row_prodect[5];
        echo "
        <div class='col-sm-4 col-sm-6 single'>
            <div class='product'>
                <a href='detials.php?pro_id=$pro_id'>
                    <img src='admin_area/prouduct_img/$pro_img1' class='img-responsive' style='height:10em;width:100%;'>
                </a>
                <div class='text'>
                    <h3>
                        <a href='detials.php?pro_id=$pro_id'>$pro_title</a>
                    </h3>
                    <p class='price'>INR $pro_price /KG</p>
                    <p class='button'>
                        <a href='detials.php?pro_id=$pro_id' class='btn btn-default'>View Detials</a>
                        <a href='detials.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add to cart</a>
                    </p>
                </div>
            </div>
        </div>
        ";
    }
}
function getpcats()
{
    global $db;
    $get_p_cat = "SELECT * FROM `product_categories`";
    $run_p_cat = mysqli_query($db, $get_p_cat);
    while ($row_p_cat = mysqli_fetch_array($run_p_cat)) {
        $p_cat_id = $row_p_cat[0];
        $p_cat_tile = $row_p_cat[1];
        echo "
        <li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_tile</a></li>
        ";
    }
}
function getcat()
{
    global $db;
    $get_cat = "SELECT * FROM `categories` ";
    $run_cat = mysqli_query($db, $get_cat);
    while ($row_cat = mysqli_fetch_array($run_cat)) {
        $cat_id = $row_cat[0];
        $cat_tile = $row_cat[1];
        echo "
        <li><a href='shop.php?cat_id=$cat_id'>$cat_tile</a></li>
        ";
    }
}
// get prodect content
function getpcatprodispay()
{
    global $db;
    if (isset($_GET['p_cat'])) {
        $p_cat_id = $_GET['p_cat'];
        $get_p_cate = "SELECT * FROM `product_categories` WHERE p_cat_id='$p_cat_id'";
        $run_cate = mysqli_query($db, $get_p_cate);
        $row_cate = mysqli_fetch_array($run_cate);
        $p_cate_title = $row_cate[1];
        $p_cate_dese = $row_cate[2];

        $get_prodects = "SELECT * FROM `products` WHERE p_cat_id='$p_cat_id'";
        $run_prodect = mysqli_query($db, $get_prodects);
        $count = mysqli_num_rows($run_prodect);
        if ($count == 0) {
            echo "
            <div class='box'>
            <h1>No Prodect found In $p_cate_title Category</h1>
            </div>
            ";
        } else {
            echo "
            <div class='box'>
            <h1>$p_cate_title</h1>
            <p>$p_cate_dese</p>
            </div>
            ";
        }
        while ($row_categ = mysqli_fetch_array($run_prodect)) {
            $pro_id = $row_categ[0];
            $pro_title = $row_categ[4];
            $pro_img1 = $row_categ[5];
            $pro_price = $row_categ[8];
            echo '
            <div class="col-md-4 col-sm-6 center-responsive ">
                <div class="product">
                    <a href="detials.php?pro_id=' . $pro_id . '">
                        <img src="admin_area/prouduct_img/' . $pro_img1 . '" class="img-responsive" >
                    </a>
                    <div class="text">
                        <h3>
                            <a href="detials.php">' . $pro_title . '</a>
                        </h3>
                        <p class="price">INR ' . $pro_price . ' /KG</p>
                        <p class="button">
                            <a href="detials.php?pro_id=' . $pro_id . '" class="btn btn-default">View Detials</a>
                            <a href="detials.php?pro_id=' . $pro_id . '" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </p>
                    </div>
                </div>
            </div>
            ';
        }
    }
}

// get categry
function getcatdispay()
{
    global $db;
    if (isset($_GET['cat_id'])) {
        $cat_id = $_GET['cat_id'];
        $get_cate = "SELECT * FROM `categories` WHERE cat_id='$cat_id'";
        $run_cate_d = mysqli_query($db, $get_cate);
        $row_cate_d = mysqli_fetch_array($run_cate_d);
        $cate_title = $row_cate_d[1];
        $cate_dese = $row_cate_d[2];
        $get_prodects = "SELECT * FROM `products` WHERE cat_id='$cat_id'";
        $run_prodect = mysqli_query($db, $get_prodects);
        $count = mysqli_num_rows($run_prodect);
        if ($count == 0) {
            echo "
            <div class='box'>
            <h1>No Prodect found In $cate_title Category</h1>
            </div>
            ";
        } else {
            echo "
            <div class='box'>
            <h1>$cate_title</h1>
            <p>$cate_dese</>
            </div>
            ";
        }
        while ($row_categ = mysqli_fetch_array($run_prodect)) {
            $pro_id = $row_categ[0];
            $pro_title = $row_categ[4];
            $pro_img1 = $row_categ[5];
            $pro_price = $row_categ[8];
            echo '
            <div class="col-md-4 col-sm-6 center-responsive ">
                <div class="product">
                    <a href="detials.php?pro_id=' . $pro_id . '">
                        <img src="admin_area/prouduct_img/' . $pro_img1 . '" class="img-responsive" >
                    </a>
                    <div class="text">
                        <h3>
                            <a href="detials.php">' . $pro_title . '</a>
                        </h3>
                        <p class="price">INR ' . $pro_price . ' /KG</p>
                        <p class="button">
                            <a href="detials.php?pro_id=' . $pro_id . '" class="btn btn-default">View Detials</a>
                            <a href="detials.php?pro_id=' . $pro_id . '" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </p>
                    </div>
                </div>
            </div>
            ';
        }
    }
}

// main shop
function direct_shop()
{
    global $db;
    echo "
    <!-- box start -->
    <div class='box'>
        <h1>Shop</h1>
        <p>
            Kashipur Veg Adda is a online veg store
        </p>
    </div>
    <!-- box end -->
    <!-- row start -->
    <div class='row'>
    ";
    $per_page = 6;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $start_form = ($page - 1) * $per_page;
    $get_prodect = "SELECT * FROM `products` ORDER BY 1 DESC LIMIT $start_form,$per_page";
    $run_pro = mysqli_query($db, $get_prodect);
    while ($row = mysqli_fetch_array($run_pro)) {
        $pro_id = $row[0];
        $pro_title = $row[4];
        $pro_price = $row[8];
        $pro_img1 = $row[5];
        echo '
        <!-- start product -->
        <div class="col-md-4 col-sm-6 center-responsive ">
            <div class="product">
                <a href="detials.php?pro_id=' . $pro_id . '">
                    <img src="admin_area/prouduct_img/' . $pro_img1 . '" class="img-responsive">
                </a>
                <div class="text">
                    <h3>
                        <a href="detials.php">' . $pro_title . '</a>
                    </h3>
                    <p class="price">INR ' . $pro_price . ' /KG</p>
                    <form action="detials.php?add_cart=' . $pro_id . '" method="post" >
                    <p class="button ">
                        <a href="detials.php?pro_id=' . $pro_id . '" class="btn btn-default">View Detials</a>
                        <button  class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                    </p>
                    </form>
                </div>
            </div>
        </div>
        <!-- close product -->';
    }
    echo '
        </div>
        <!-- row end -->
        <center>
            <ul class="pagination">';
    $query = "SELECT * FROM `products`";
    $result = mysqli_query($db, $query);
    $total_record = mysqli_num_rows($result);
    $total_page = ceil($total_record / $per_page);
    echo '
                <li><a href="shop.php?page=1">First Page</a></li>';
    for ($i = 1; $i < $total_page; $i++) {
        echo '
                <li><a href="shop.php?page=' . $i . '">' . $i . '</a></li>';
    }
    echo '      <li><a href="shop.php?page=' . $total_page . '">Last Page</a></li>
            </ul>
        </center>';
}

// reletive 
function getreletivepro()
{
    global $db;
    $get_prodect = "SELECT * FROM `products` ORDER BY `products`.`date` DESC LIMIT 0,4";
    $run_prodects = mysqli_query($db, $get_prodect);
    while ($row_prodect = mysqli_fetch_array($run_prodects)) {
        $pro_id = $row_prodect[0];
        $pro_title = $row_prodect[4];
        $pro_price = $row_prodect[8];
        $pro_img1 = $row_prodect[5];
        echo "
        <div class='col-sm-4 col-lg-4 col-md-4 '>
            <div class='product'>
                <a href='detials.php?pro_id=$pro_id'>
                    <img src='admin_area/prouduct_img/$pro_img1' class='img-responsive' style='height:10em;width:100%;'>
                </a>
                <div class='text'>
                    <h3>
                        <a href='detials.php?pro_id=$pro_id'>$pro_title</a>
                    </h3>
                    <p class='price'>INR $pro_price /KG</p>
                    <p class='button'>
                        <a href='detials.php?pro_id=$pro_id' class='btn btn-default'>View Detials</a>
                        <a href='detials.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add to cart</a>
                    </p>
                </div>
            </div>
        </div>
        ";
    }
}
