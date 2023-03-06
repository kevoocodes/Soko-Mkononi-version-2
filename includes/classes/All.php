<?php

class All{
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getCategoryId() {
        $query = mysqli_query($this->conn, "SELECT id FROM category");
        $row = mysqli_fetch_array($query);
        return $row['id'];
}


    public function getCategory() {
            $query = mysqli_query($this->conn, "SELECT categoryName FROM category");
			$row = mysqli_fetch_array($query);
			return $row['categoryName'];
    }

    public function addWishlist() {
        $date = date("Y-m-d H:i:s");
        $query = mysqli_query($this->conn,"insert into wishlist(userId,productId,dateCreated) values('".$_SESSION['id']."','".$_GET['pid']."', '$date')");
        echo "<script>alert('Product aaded in wishlist');</script>";
        header('location:wishlist.php');
    }

    public function addToCart() {
       
        $id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$query_p=mysqli_query($this->conn, "SELECT * FROM products WHERE id={$id}");
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
				// echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='cart.php'; </script>";
		}else{
			$message="Product ID is invalid";
		}
	}
    }
}





?>