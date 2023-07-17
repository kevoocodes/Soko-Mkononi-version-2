<?php
error_reporting(0);
include("../includes/config.php");
if (strlen($_SESSION['id']==0)) {
    header("location: ../login.php");
}else {
    if(isset($_POST['submit'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;

			}
		}
			echo "<script>alert('Your Cart hasbeen Updated');</script>";
		}
	}
// Code for Remove a Product from Cart
if(isset($_POST['remove_code']))
	{

if(!empty($_SESSION['cart'])){
		foreach($_POST['remove_code'] as $key){
			
				unset($_SESSION['cart'][$key]);
		}
			echo "<script>alert('Your Cart has been Updated');</script>";
	}
}
// code for insert product in order table


if(isset($_POST['ordersubmit'])) 
{

	$quantity=$_POST['quantity'];
	$pdd=$_SESSION['pid'];
	$value=array_combine($pdd,$quantity);
    $date = date("Y-m-d H:i:s");
    $paymentMethod = $_POST['paymentMethod'];
    $status = 1;

		foreach($value as $qty=> $val34){

        mysqli_query($con,"insert into orders(userId,productId,quantity,orderdate,paymentMethod,orderStatus) values('".$_SESSION['id']."','$qty','$val34','$date','$paymentMethod','$status')");
        header('location:payment.php');
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

    
<?php include("includes/header.php"); ?>

<!-- Topbar Start -->
<?php include("includes/topbar.php"); ?>
<!-- Topbar End -->


<!-- Navbar Start -->
<?php include("includes/navigation.php"); ?>
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



<form action="" method="post">
            <!-- Cart Start -->
            <div class="container-fluid pt-5">
                    <div class="row px-xl-5">
                        <div class="col-lg-8 table-responsive mb-5">
                        
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
                                        <td class="align-middle"><img src="../admin/productimages/<?php echo $row['id']; ?>/<?php echo $row['productImage']; ?>" alt="" style="width: 50px;"> <?php echo $row['productName']; ?> </td>
                                        <td class="align-middle">Tsh <?php echo $row['productPrice']; ?> </td>
                                        <td class="align-middle">
                                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-sm btn-primary btn-minus">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                                <input type="text" class="form-control form-control-sm bg-secondary text-center quantity-input" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" name="quantity[<?php echo $row['id']; ?>]">
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
                          
                        </div>






                         <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div>
            
                    
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" placeholder="New York">
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" placeholder="123">
                        </div>
                       

                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>

            
        </div>
    </div>
    <!-- Checkout End -->
















                        <div class="col-lg-4">
                                   
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
                                    <button type="submit" name="ordersubmit" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cart End -->


                </form>

                                


            <?php
                        }  else {

                            echo "<p style ='text-align: center; font-size: 40px;'>No cart here</p>";

                        } 
                        
            ?>





        <!-- Footer Start -->
<?php include("includes/footer.php"); ?>
<!-- Footer End -->
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

<script>
    $(document).ready(function() {
        // Plus button click
        $('.btn-plus').on('click', function() {
            var input = $(this).closest('.input-group').find('.quantity-input');
            var newVal = parseInt(input.val()) + 1;
            input.val(newVal).trigger('change');
        });

        // Minus button click
        $('.btn-minus').on('click', function() {
            var input = $(this).closest('.input-group').find('.quantity-input');
            var newVal = parseInt(input.val()) - 1;
            if (newVal >= 0) {
                input.val(newVal).trigger('change');
            }
        });
    });
</script>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="assets/mail/jqBootstrapValidation.min.js"></script>
<script src="assets/mail/contact.js"></script>

<!-- Template Javascript -->
<script src="assets/js/main.js"></script>

<!-- this -->

</body>

</html>


    <?php
}


?>

