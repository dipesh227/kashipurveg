<div id="footer">
    <div class="container">
        <div class="row">
            <!-- start col-md-3 -->
            <div class="col-md-3 col-sm-6">
                <h4>Pages</h4>
                <ul class="list-unstyled">
                    <li><a href="../cart">Sopping Cart</a></li>
                    <li><a href="../contect">Contect Us</a></li>
                    <li><a href="../shop">Shop</a></li>
                    <li><a href="my_account">My Account</a></li>
                </ul>
                <hr>
                <h4>User Section</h4>
                <ul class="list-unstyled">
                    <li><a href="../login">Login</a></li>
                    <li><a href="../customer_registration">Ragister</a></li>
                </ul>
                <hr class="hidden-md hidden-lg hidden-sm">
            </div>
            <!-- end col-md-3 -->
            <!-- start col-md-3 -->
            <div class="col-md-3 colsm-6">
                <h4>Top Products Categories</h4>
                <ul class="list-unstyled">
                <?php
                    $get_p_cat="SELECT * FROM `product_categories` ";
                    $run_p_cat=mysqli_query($con,$get_p_cat);
                    while ($row_p_cat=mysqli_fetch_array($run_p_cat)) {
                        $p_cat_id=$row_p_cat[0];
                        $p_cat_title=$row_p_cat[1];
                        echo "<li><a href='../shop?p_cat=$p_cat_id'>$p_cat_title</a></li>";
                    }
                    ?>
                </ul>
                <hr class="hidden-md hidden-lg">
            </div>
            <!-- end col-md-3 -->
            <!-- start col-md-3 -->
            <div class="col-md-3 colsm-6">
                <h4>Where To Find</h4>
                <p>
                    <strong>kashipurvegadda.com</strong>
                    <br>Kashipur
                    <br>U.S.Nagar
                    <br>uttrakhand
                    <br>kashipurveadda@gmail.com
                    <br>+91 8630484930
                </p>
                <a href="contect">Goto Contect Us Page</a>
                <hr class="hidden-md hidden-lg">
            </div>
            <!-- end col-md-3 -->
            <!-- start col-md-3 -->
            <div class="col-md-3 colsm-6">
                <h4>Get The News</h4>
                <p class="text-muted">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. In id reprehenderit voluptatem perferendis eos?
                </p>
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" name="email" id="" class="form-control">
                        <span class="input-group-btn">
                            <input type="submit" value="subscribe" class="btn btn-default">
                        </span>
                    </div>
                </form>
                <hr>
                <h4>Stat In Touch</h4>
                <p class="social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-envelope"></i></a>
                </p>
            </div>
            <!-- end col-md-3 -->
        </div>
    </div>
</div>
<!-- copyroght section start -->
<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">
                &copy; 2020 Kashipur Veg Adda
            </p>
        </div>
        <div class="col-md-6">
            <p class="pull-right">
                All Right Reservrd
            </p>
        </div>
    </div>
</div>
<!-- copyroght section end -->
<!-- footer end-->

<!-- Latest compiled JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>