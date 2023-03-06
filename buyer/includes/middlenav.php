<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">SOKO</span>Mkononi</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="dashboard.php" class="nav-item nav-link active">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <!-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.php" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.php" class="dropdown-item">Checkout</a>
                                </div>
                            </div> -->
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                               <?php
                                    include("../includes/classes/Buyer.php"); 
                                    $buyer = new Buyer($con,$_SESSION['id']);   
                                ?>
                            <img src="<?php echo $buyer->getBuyerProfileImage(); ?>" style="width: 40px; height: 40px; margin-top: 10px" alt="">
                            <div class="nav-item dropdown">
                             
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $buyer->getBuyerUsername(); ?></a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="profile.php" class="dropdown-item">Profile</a>
                                    <a href="wishlist.php" class="dropdown-item">My wishlist</a>
                                    <a href="orders.php" class="dropdown-item">Your Orders</a>
                                    <a href="logout.php" class="dropdown-item">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
    </nav>