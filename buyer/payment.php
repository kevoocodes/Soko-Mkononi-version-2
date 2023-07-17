<?php
error_reporting(0);
include("../includes/config.php");
if (strlen($_SESSION['id']==0)) {
    header("location: ../login.php");
}else {
    if (isset($_POST['submit'])) {

        $userid = $_SESSION['id'];
        $payment = $_POST['payment'];
		// mysqli_query($con,"update orders set paymentMethod='".$_POST['payment']."' where userId='".$_SESSION['id']."' and paymentMethod is null ");
        $query = $con->query("UPDATE orders SET paymentMethod = '$payment' WHERE userId = '$userid'");
        if($query) {
            unset($_SESSION['cart']);
            header('location:orders.php');
        }
        else {
            echo "<script>alert('Not Updated')</script>";
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
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Payments Methods</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Payment</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
            <div class="contact-form">
                <div id="success"></div>
                <form  method="POST">


                                <div class="col-lg-8">

                                <div class="card border-secondary mb-5">
                                    <div class="card-header bg-secondary border-0">
                                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="payment" value="M-PESA" id="paypal">
                                                <label class="custom-control-label" for="paypal">M-PESA</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="payment" value="TIGO-PESA" id="directcheck">
                                                <label class="custom-control-label" for="directcheck">TIGO-PESA</label>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="payment" value="AIRTEL MONEY" id="banktransfer">
                                                <label class="custom-control-label" for="banktransfer">AIRTEL MONEY</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer border-secondary bg-transparent">
                                        <button type="submit" name="submit" class="btn-primary my-3 py-3">Place Order</button>
                                    </div>
                                </div>
                                </div>

                </form>
            </div>
        </div>
       
       
    </div>
</div>
<!-- Contact End -->


<!-- Footer Start -->
<?php include("includes/footer.php"); ?>


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="assets/lib/easing/easing.min.js"></script>
<script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="assets/mail/jqBootstrapValidation.min.js"></script>
<script src="assets/mail/contact.js"></script>

<!-- Template Javascript -->
<script src="assets/js/main.js"></script>
</body>

</html>


<?php

}  


?>








