<?php
error_reporting(0);
 include("includes/config.php"); ?>
<?php
if(isset($_POST['submit'])){
    if(!empty($_SESSION['cart'])){
    foreach($_POST['quantity'] as $key => $val){
        if($val==0){
            unset($_SESSION['cart'][$key]);
        }else{
            $_SESSION['cart'][$key]['quantity']=$val;

        }
    }
        // echo "<script>alert('Your Cart hasbeen Updated');</script>";
    }
}
// Code for Remove a Product from Cart
if(isset($_POST['remove_code']))
{

if(!empty($_SESSION['cart'])){
    foreach($_POST['remove_code'] as $key){
        
            unset($_SESSION['cart'][$key]);
    }
        // echo "<script>alert('Your Cart has been Updated');</script>";
}
}
// code for insert product in order table


if(isset($_POST['ordersubmit'])) 
{

if(strlen($_SESSION['login'])==0)
{   
header('location:login.php');
}
else{

$quantity=$_POST['quantity'];
$pdd=$_SESSION['pid'];
$value=array_combine($pdd,$quantity);


    foreach($value as $qty=> $val34){



mysqli_query($con,"insert into orders(userId,productId,quantity) values('".$_SESSION['id']."','$qty','$val34')");
header('location:payment-method.php');
}
}
}

// code for billing address updation
if(isset($_POST['update']))
{
    $baddress=$_POST['billingaddress'];
    $bstate=$_POST['bilingstate'];
    $bcity=$_POST['billingcity'];
    $bpincode=$_POST['billingpincode'];
    $query=mysqli_query($con,"update users set billingAddress='$baddress',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode' where id='".$_SESSION['id']."'");
    if($query)
    {
echo "<script>alert('Billing Address has been updated');</script>";
    }
}


// code for Shipping address updation
if(isset($_POST['shipupdate']))
{
    $saddress=$_POST['shippingaddress'];
    $sstate=$_POST['shippingstate'];
    $scity=$_POST['shippingcity'];
    $spincode=$_POST['shippingpincode'];
    $query=mysqli_query($con,"update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='".$_SESSION['id']."'");
    if($query)
    {
echo "<script>alert('Shipping Address has been updated');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Soko Mkononi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="assets/img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">SOKO</span>Mkononi</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                         <form action="search.php" method="POST">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search for products">
                                <div class="input-group-append">
                                    <button type="submit" name="submit"  style="background-color: transparent; border: none;">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"> </i>
                                        </span>
                                    </button>
                                    
                                </div>
                            </div>
                        </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="login.php" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                
                 
                        <a href="" class="btn border">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge">
                                <?php
                                 $num = $_SESSION['qnty'];
                                if($num == 0) {
                                    echo "
                                    0   
                                    ";
                                }else {
                                    echo $_SESSION['qnty'];
                                }
                                ?>
                            </span>
                        </a>

                 
                
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                       
                        <?php
                        
                        $sql = $con->query("SELECT *  FROM category");
                        while($row = $sql->fetch_array()) {
                            echo " 
                                <a href='category.php?id= $row[id]' class='nav-item nav-link'> $row[categoryName] </a>
                            ";
                        }
                        
                        ?>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">SOKO</span>Mkononi</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <a href="login.php" class="nav-item nav-link">Login</a>
                            <a href="register.php" class="nav-item nav-link">Register</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <form action="" method="POST">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <!-- <th>Total</th> -->
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">

                    <?php
                $pdtid=array();
                $sql = "SELECT * FROM products WHERE id IN(";
                        foreach($_SESSION['cart'] as $id => $value){
                        $sql .=$id. ",";
                        }
                        $sql=substr($sql,0,-1) . ") ORDER BY id ASC";
                        $query = mysqli_query($con,$sql);
                        $totalprice=0;
                        $totalqunty=0;
                        if(!empty($query)){
                        while($row = mysqli_fetch_array($query)){
                            $quantity=$_SESSION['cart'][$row['id']]['quantity'];
                            $subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge'];
                            $totalprice += $subtotal;
                            $_SESSION['qnty']=$totalqunty+=$quantity;

                            array_push($pdtid,$row['id']);

                     ?>

                     
                    <tr>
                            <td class="align-middle"><img src="admin/productimages/<?php echo $row['id']; ?>/<?php echo $row['productImage']; ?>" alt="" style="width: 50px;"> <?php echo $row['productName']; ?> </td>
                            <td class="align-middle">Tsh <?php echo $row['productPrice']; ?> </td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <!-- <td class="align-middle">$150</td> -->
                            <td class="align-middle"><input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($row['id']);?>" /></td>
                        </tr>






                            <?php  }
                            $_SESSION['pid']=$pdtid;
                                    ?>

                                              
                    </tbody>
                </table>
                        <input type="submit" name="submit" value="Delete shopping cart" class="btn  btn-primary mt-5">
                </form>
            </div>
            <div class="col-lg-4">
                <!-- <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form> -->
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <!-- <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div> -->
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">Tsh.<?php echo $_SESSION['tp']="$totalprice". ".00"; ?></h5>
                        </div>
                        <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

                     


<?php
            }  else {

                echo "<p style ='text-align: center; font-size: 40px;'>No cart here</p>";

            } 
            
?>
       
        



       
    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">Soko</span>Mkononi</h1>
                </a>
                <p> ni huduma inayokupa fursa ya kufanya maamuzi ya nini,wakati gani na kwanini ule, mahali popote ulipo kwa kutumia kifaa chako ukipendacho cha mawasiliano</p>
              
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                          <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Kigamboni, Dar es Salaam, Tanzania</p>
                        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>Sokomkononi@example.com</p>
                        <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+255 672 123 122</p>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Soko Mkononi</a>. All Rights Reserved. Designed
                    by
                    <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">kevoocodes</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="assets/img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="assets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="assets/js/main.js"></script>
</body>

</html>