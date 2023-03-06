<?php 

class Product{
    private $con;
    private $id;
    private $productid;
    private $productname;
    private $productCategory;
    private $productPrice;
    private $productBeforediscount;
    private $productDescription;
    private $productImageOne;
    private $productImageTwo;
    private $productImageThree;
    private $productDelCharge;
    private $DateCreated;
    private $categoryid;
    private $subcategoryid;
    private $SellerId;

    public function __construct($con, $id) {
        $this->con = $con;
        $this->id = $id;

			$query = mysqli_query($this->con, "SELECT * FROM Products WHERE id='$this->id'");
			$fetch = mysqli_fetch_array($query);

            $this->productid = $fetch['id'];
			$this->productname = $fetch['productName'];
			$this->productPrice = $fetch['productPrice'];
			$this->productBeforediscount = $fetch['priceBeforeDiscount'];
			$this->productDescription = $fetch['productDescription'];
            $this->productImageOne = $fetch['productImage'];
            $this->productImageTwo = $fetch['productImage2'];
            $this->productImageThree = $fetch['productImage3'];
            $this->productDelCharge = $fetch['deliveryCharge'];
            $this->DateCreated = $fetch['postingDate']; 
            $this->categoryid = $fetch['category'];
            $this->subcategoryid = $fetch['subcategory'];
            $this->SellerId   = $fetch['productOwner'];


    }

    public function getProductId() {
        return $this->productid;
    }

    public function getSellerId() {
        return $this->SellerId;
    }
    

    public function getCategoryId() {
        return $this->categoryid;
    }

    public function getSubCategoryId() {
        return $this->subcategoryid;
    }


    public function getProductName() {
        return $this->productname;
    }

    public function getProductCategory() {
        return $this->productCategory;
    }

    public function getProductPrice() {
        return $this->productPrice;
    }

    public function getProductBeforeDisc() {
        return $this->productBeforediscount;
    }

    public function getProductDesc() {
        return $this->productDescription;
    }

    public function getImageOne() {
        return $this->productImageOne;
    }

    public function getImageTwo() {
        return $this->productImageTwo;
    }

    public function getImageThree() {
        return $this->productImageThree;
    }

    public function getDeliverCharge() {
        return $this->productDelCharge;
    }

    public function getDate() {
        return $this->DateCreated;
    }

    public function getProductSellerName() {
        $query = mysqli_query($this->con, "SELECT fullname FROM from seller WHERE id='$this->id'");
        $row = mysqli_fetch_array($query);
        return $row['fullname'];
    }

}




?>