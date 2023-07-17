<?php
error_reporting(0);
include("../includes/config.php");
if (strlen($_SESSION['id']==0)) {
    header("location: ../login.php");
}else {

        include("../includes/classes/All.php");
            $all = new All($con);
        if(isset($_GET['action']) && $_GET['action']=="add"){
            $all->addToCart();
            
        }

        if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){

            $all->addWishlist();

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
<?php
    $categoryid = $_GET['id'];
    include("../includes/classes/Category.php");
    $category = new Category($con, $categoryid);
    

    ?>
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3"><?php echo $category->getCategoryName(); ?></h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <!-- Shop Sidebar End -->


         <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                
                    <?php 
                            if(isset($_POST['submit'])){
                                $search = mysqli_real_escape_string($con, $_POST['search']);
                                $sql = $con->query("SELECT * FROM products WHERE productName LIKE '%$search%' LIMIT 10");

                                if($sql->num_rows == 0) {
                                        echo "<p style='text-align: center'>No product matching  $search</p>";
                                }else {
                                    while($row = $sql->fetch_array()) {
                                        ?>

                                            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                                    <div class="card product-item border-0 mb-4">
                                                        <a href="detail.php?id=<?php echo $row['id']; ?>">
                                                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                                            <img class="img-fluid w-80 p-5" src="../admin/productimages/<?php echo $row['id'] ?>/<?php echo $row['productImage']; ?>" alt="">
                                                        </div>
                                                        </a>
                                                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                                            <h6 class="text-truncate mb-3"><?php echo $row['productName']; ?></h6>
                                                            <div class="d-flex justify-content-center">
                                                                <h6>Tsh <?php echo $row['productPrice']; ?>.00</h6><h6 class="text-muted ml-2"><del>Tsh <?php echo $row['priceBeforeDiscount']; ?>.00</del></h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer d-flex justify-content-between bg-light border">
                                                            
                                                            <a href="search.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" class="btn btn-sm text-dark p-0"><i class="fas fa-heart text-primary mr-1"></i></a>
                                                            <a href="search.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                                        </div>
                                                    </div>
                                                </div>


                                <?php

                                    }
                                }
                                
                            }

                            ?>
                  


                  
                
                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                          <ul class="pagination justify-content-center mb-3">
                            <li class="page-item disabled">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


  <!-- Footer Start -->
  <?php include("includes/footer.php"); ?>
<!-- Footer End -->



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

