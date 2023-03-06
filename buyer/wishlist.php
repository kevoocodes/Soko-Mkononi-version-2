<?php
include("../includes/config.php");
if (strlen($_SESSION['id']==0)) {
    header("location: ../login.php");
}else {

?>

<?php

    $wid=intval($_GET['del']);
    if(isset($_GET['del']))
    {

    $query = $con->query("delete from wishlist where id='$wid'");
    if($query) {
        echo "<script>alert('Data Delete')</script>";
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
        <h1 class="font-weight-semi-bold text-uppercase mb-3">My Wishlist</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="dashboard.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">My Wishlist</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            
                    <?php
                    
                    $userid = $_SESSION['id'];
                    $sql = $con->query("SELECT * from wishlist WHERE userId = '$userid'");
                    $numrow = $sql->num_rows;

                    if($numrow > 0) {
                        ?>
                                <table class="table table-bordered text-center mb-0">
                                    <thead class="bg-secondary text-dark">
                                        <tr>
                                            <th>Products</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">

                                    <?php

                                        while($row = $sql->fetch_array()) {
                                            $proid = $row['productId'];
                                            $product = $con->query("SELECT * FROM products WHERE id = '$proid'");
                                            $productrow = $product->fetch_array(); 

                                ?>

                                        <tr>
                                            <td class="align-middle"><img src="../admin/productimages/<?php echo $productrow['id'] ?>/<?php echo $productrow['productImage']; ?>" alt="" style="width: 50px;"> <?php echo $productrow['productName']; ?></td>
                                            <td class="align-middle"><?php echo $productrow['productPrice']; ?></td>
                                            
                                            <td class="align-middle"> <a href="category.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"> </i>Add To Cart</a> </td>
                                            <td class="align-middle"><a href="wishlist.php?del= <?php echo $row['id']; ?>" onClick="return confirm('Are you sure you want to delete?')" ><i class="fa fa-times"></i></a></td>
                                        </tr>


                                    

                                            <?php
                                        }
                    
                    
                    ?>
                   
                 
                    
                </tbody>
            </table>

                        <?php

                    }else {
                        echo "<p style='text-align: center; font-size: 40px;'>You Don't have any wishlist</p> <br>
                            
                        ";
                    }
    ?>
        </div>
       
    </div>
</div>
<!-- Cart End -->


        <!-- Footer Start -->
<?php include("includes/footer.php"); ?>
<!-- Footer End -->
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


    <?php
}


?>

