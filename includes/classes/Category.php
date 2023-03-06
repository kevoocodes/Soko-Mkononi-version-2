<?php 

 class Category{
    private $con;
    private $id;

    public function __construct($con, $id) {
        $this->con = $con;
        $this->id = $id;
    }

    public function getCategoryId() {
        $query = mysqli_query($this->con, "SELECT id FROM category WHERE id='$this->id'");
        $row = mysqli_fetch_array($query);
        return $row['id'];
    }

    public function getCategoryName() {
        $query = mysqli_query($this->con, "SELECT categoryName FROM category WHERE id='$this->id'");
        $row = mysqli_fetch_array($query);
        return $row['categoryName'];
    }

    public function getCategoryDesc() {
        $query = mysqli_query($this->con, "SELECT categoryDescription FROM category WHERE id='$this->id'");
        $row = mysqli_fetch_array($query);
        return $row['categoryDescription'];
    }

    public function getSubCategoryName() {
        $query = mysqli_query($this->con, "SELECT subcategoryName FROM subCategory WHERE id='$this->id'");
        $row = mysqli_fetch_array($query);
        return $row['subcategoryName'];
    }

   

}

?>