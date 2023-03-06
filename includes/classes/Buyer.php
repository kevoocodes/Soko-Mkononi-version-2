<?php

class Buyer{
    private $con;
    private $id;
    private $buyerid;
    private $username;
    private $email;
    private $fullname;
    private $profileImage;

    public function __construct($con, $id)
    {
        $this->con = $con;
        $this->id = $id;


			$query = mysqli_query($this->con, "SELECT * FROM buyer WHERE id='$this->id'");
			$buyer = mysqli_fetch_array($query);

			$this->buyerid = $buyer['id'];
			$this->username = $buyer['username'];
			$this->email = $buyer['email'];
			$this->fullname = $buyer['fullname'];
            $this->profileImage = $buyer['profileImage'];
    }

    public function getBuyerId() {
        return $this->buyerid;
    }

    public function getBuyerUsername() {
        return $this->username;
    }

    public function getBuyerEmail() {
        return $this->email;
    }

    public function getBuyerFullname() {
        return $this->fullname;
    }

    public function getBuyerProfileImage() {
        return $this->profileImage;
    }

}


?>