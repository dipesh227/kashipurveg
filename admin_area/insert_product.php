
<?php
include('includes/header.php');
?>
<body>
    <!-- breadcrumb row start -->
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>
                    Dashboard / Insert Product
                </li>
            </div>
        </div>
    </div>
    <!-- breadcrumb row close -->
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="panel panel-defaut">
                <!-- penal start -->
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-w"></i>Insert Product
                    </h3>
                </div>
                <!-- panel heading end -->
                <div class="panel-body">
                    <form action="" class="form-horizental" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Title</label>
                            <input type="text" name="pruduct_title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Category</label>
                            <select name="prodect_category" class="form-control">
                                <option value="">Select A Prodect Category</option>
                                <?php
                                $get_p_cats = "SELECT * FROM `product_categories`";
                                $run_p_cats = mysqli_query($con, $get_p_cats);
                                while ($row = mysqli_fetch_array($run_p_cats)) {
                                    $id = $row[0];
                                    $p_cat_title = $row[1];
                                    echo "<option value='$id'>$p_cat_title</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">category</label>
                            <select name="category" class="form-control">
                                <option value="">Select Category</option>
                                <?php
                                $get_cats = "SELECT * FROM `categories` ";
                                $run_cats = mysqli_query($con, $get_cats);
                                while ($row = mysqli_fetch_array($run_cats)) {
                                    $cat_id = $row[0];
                                    $cat_title = $row[1];
                                    echo "<option value='$cat_id'>$cat_title</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Image 1</label>
                            <input type="file" name="pruduct_image1" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Image 2</label>
                            <input type="file" name="pruduct_image2" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Image 3</label>
                            <input type="file" name="pruduct_image3" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Price</label>
                            <input type="text" name="pruduct_price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Keyword</label>
                            <input type="text" name="pruduct_keywords" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Desciption</label>
                            <textarea name="prodect_desc" class="form-control" cols="19" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary btn-control btn-block" value="Insert Product">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $product_title = $_POST['pruduct_title'];
    $product_cat = $_POST['prodect_category'];
    $category = $_POST['category'];
    $product_price = $_POST['pruduct_price'];
    $product_keyword = $_POST['pruduct_keywords'];
    $prodect_desc = $_POST['prodect_desc'];

    $product_img_1 = $_FILES['pruduct_image1']['name'];
    $product_img_2 = $_FILES['pruduct_image2']['name'];
    $product_img_3 = $_FILES['pruduct_image3']['name'];

    $temp_name1 = $_FILES['pruduct_image1']['tmp_name'];
    $temp_name2 = $_FILES['pruduct_image2']['tmp_name'];
    $temp_name3 = $_FILES['pruduct_image3']['tmp_name'];

    $insert_product = "INSERT INTO `products`(`p_cat_id`, `cat_id`, `products_title`,`date`, `products_img1`, `products_img2`, `products_img3`, `product_price`, `product_desc`, `product_keyword`) VALUES (' $product_cat','$category','$product_title',NOW(),'$product_img_1','$product_img_2','$product_img_3','$product_price','$prodect_desc','$product_keyword')";
    $run_product = mysqli_query($con, $insert_product);
    if ($run_product) {
        move_uploaded_file($temp_name1, "prouduct_img/$product_img_1");
        move_uploaded_file($temp_name2, "prouduct_img/$product_img_2");
        move_uploaded_file($temp_name3, "prouduct_img/$product_img_3");
        echo "<script>
        alert('Prodect Inserted Successfully');
        window.open('insert_product.php','_self');
        </script>";
    }
}
?>