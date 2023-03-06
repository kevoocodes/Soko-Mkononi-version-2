<?php
$username = "";     //This is for error
$error_array = array();      //holds error messages
if(isset($_POST['login'])) {

    $email = $_POST['email'];    //sanitize username
    $_SESSION['email_message'] = $email; //Store into a session
    $password = md5($_POST['password']); //Get Password

    $check_database_query = mysqli_query($con, "SELECT * FROM Buyer WHERE email = '$email' AND password = '$password'");
    $check_login_query = mysqli_num_rows($check_database_query);

    if($check_login_query > 0) {
        
   
        $fetcharray = $check_database_query->fetch_array();
        $date = date("Y-m-d h:i:s");
        $extra = "Buyer/dashboard.php";
        $_SESSION['id'] = $fetcharray['id'];
        $uip =$_SERVER['REMOTE_ADDR'];
        $status = 1;

        $log = $con->query("INSERT INTO userlog(id,username,userip,logintime,status) VALUES('','$username','$uip','$date','$status')");
        $host = $_SERVER['HTTP_HOST'];
        $uir = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uir/$extra");


    }else{
      
        array_push($error_array, "**Email or password was incorrect");
    }

}

?> 