<?php
include("../includes/config.php");
if (strlen($_SESSION['id']==0)) {
    header("location: ../login.php");
}else {
    ?>
    

<?php include("includes/header.php"); ?>

<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

<!-- Topbar Start -->
<?php include("includes/topbar.php"); ?>
<!-- Topbar End -->


<!-- Navbar Start -->
<?php include("includes/navigation.php"); ?>

<!-- Navbar End -->



<!-- Page Header Start --> 
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Your Orders</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Orders</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-12 mb-5">
                <div class="col-lg-12 table-responsive mb-5">
                    <?php 
                    
                        $userid = $_SESSION['id'];
                        $sql = $con->query("SELECT * from orders WHERE userId = '$userid'");
                        $num = $sql->num_rows;

                        if($num > 0) {
                         
                            ?>

                        <table class="table table-bordered text-center mb-0">
                            <thead class="bg-secondary text-dark">
                                <tr>
                                    <th>Products</th>
                                    <th>Price Per Unit</th>
                                    <th>Quantity</th>
                                    <th>GrandTotal</th>
                                    <th>Payment Method</th>
                                    <th>Order Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">

                            <?php 
                               while($row = $sql->fetch_array()) {
                                $productid = $row['productId'];
                                $qnt = $row['quantity'];
                                $sqlproduct = $con->query("SELECT * FROM products WHERE id = $productid");
                                $fetchproduct = $sqlproduct->fetch_array();
                                $price = $fetchproduct['productPrice'];

                                ?>
                                <tr>
                                    <td class="align-middle"><img src="../admin/productimages/<?php echo $fetchproduct['id'] ?>/<?php echo $fetchproduct['productImage']; ?>" alt="" style="width: 50px;"> <?php echo $fetchproduct['productName']; ?></td>
                                    <td class="align-middle">Tsh <?php echo $fetchproduct['productPrice']; ?></td>
                                    <td class="align-middle"><?php echo $row['quantity']; ?></td>
                                    
                                    <td class="align-middle">Tsh <?php echo $qnt * $price; ?></td>
                                    <td class="align-middle"> <?php echo $row['paymentMethod']; ?></td>
                                    <td class="align-middle"> <?php echo date("M d,Y",strtotime($row['orderdate'])); ?></td>
                                   
                                    <td class="align-middle">
 <a href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo htmlentities($row['id']);?>');" title="Track order">
					Track</a></td>
                                </tr>





                            <?php

                            }
                            
                            
                            
                            ?>
                                
                              
                            </tbody>
                        </table>

                            <?php

                        }else {
                            echo "No data here";
                        }
                    
                    
                    
                    ?>
       
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

