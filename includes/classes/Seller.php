<?php

class Seller {
    private $con;
    private $id;
    public function __construct($con, $id) {
        $this->con = $con;
        $this->id = $id;
    }

    public function getSellerOwnerId() {
        $query = mysqli_query($this->con, "SELECT ownerid FROM from seller WHERE id='$this->id'");
        $row = mysqli_fetch_array($query);
        return $row['ownerid'];
    }

    public function getSellerName() {
        $query = mysqli_query($this->con, "SELECT fullname FROM from seller WHERE id='$this->id'");
        $row = mysqli_fetch_array($query);
        return $row['fullname'];
    }

    public function getSellerEmail() {
        $query = mysqli_query($this->con, "SELECT email FROM from seller WHERE id='$this->id'");
        $row = mysqli_fetch_array($query);
        return $row['email'];
    }

    public function getSellerPhonenumber() {
        $query = mysqli_query($this->con, "SELECT phonenumber FROM from seller WHERE id='$this->id'");
        $row = mysqli_fetch_array($query);
        return $row['phonenumber'];
    }

    public function getSellerAddress() {
        $query = mysqli_query($this->con, "SELECT address FROM from seller WHERE id='$this->id'");
        $row = mysqli_fetch_array($query);
        return $row['address'];
    }
}

?>