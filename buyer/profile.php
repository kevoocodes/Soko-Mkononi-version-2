<?php
error_reporting(0);
include("../includes/config.php");
if (strlen($_SESSION['id']==0)) {
    header("location: ../login.php");
}else {
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
        <h1 class="font-weight-semi-bold text-uppercase mb-3">My Profile</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">My profile</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-fluid pt-5">
    
    <div class="row px-xl-5">
        <div class="col-lg-12 mb-5">
            <div class="contact-form">
                <div id="success"></div>
        
                 <form name="sentMessage" id="contactForm" novalidate="novalidate">
                    <div class="control-group">
                        <label for="">Fullname</label>
                        <input type="text" class="form-control" id="name" value="<?php echo $buyer->getBuyerFullname() ?>" placeholder="Your Name"
                            required="required" data-validation-required-message="Please enter your name" / readonly>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                    <label for="">Email</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $buyer->getBuyerEmail(); ?>" placeholder="Your Email"
                            required="required" data-validation-required-message="Please enter your email" / readonly>
                        <p class="help-block text-danger"></p>
                    </div>

                    
                </form>
            </div>
        </div>
        <div class="col-lg-5 mb-5">
          
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

