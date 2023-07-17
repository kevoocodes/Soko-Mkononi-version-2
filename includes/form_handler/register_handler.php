<?php

//Declaring variables to prevent errors
$username = "";
$fullname = ""; //email 
$email = ""; //username 
$password = ""; //password 
$password2 = ""; //password 2 
$error_array = array(); //holds error messages


if(isset($_POST['register'])) {

    //Registration form valuees
    //fullname
    $fullname = strip_tags($_POST['fullname']);
    $fullname = str_replace(' ', '', $fullname); //remove spaces 
    $_SESSION['fullname'] = $fullname;  //store session into session variables

      //email
      $email = strip_tags(trim($_POST['email']));
      $email = str_replace(' ', '', $email); //remove spaces 
      $_SESSION['email'] = $email;  //store session into session variables

      //username
      $username = strip_tags(trim($_POST['username']));
      $username = str_replace(' ', '', $username); //remove spaces 
      $_SESSION['username'] = $username;  //store session into session variables

    //Password
    $password = strip_tags($_POST['password']);
    $password2 = strip_tags($_POST['comfirmPassword']); //remove html tags

    $date = date("Y-m-d H:i:s"); //current date 



    //username validation 
    if(strlen($username) > 16 || strlen($username) < 4) {
        array_push($error_array, "Your username must be between 4 and 16 characters");

    }else{
        $sqlusername = mysqli_query($con, "SELECT username FROM Buyer WHERE username = '$username'");
        $num_row_username = mysqli_num_rows($sqlusername);

        //username count return 

        if($num_row_username > 0) {
            array_push($error_array, "Username is already in use");
        }
    }




    //email validation
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($error_array, "Invalid email format");
      }  else {

        $sqlemail = mysqli_query($con, "SELECT email FROM Buyer WHERE email = '$email'");
            $num_row_email = mysqli_num_rows($sqlemail);

            //username count return 

            if($num_row_email > 0) {
                array_push($error_array, "email is already in use");
            }

      }




            //password validation 
            //Password validation
            if(strlen($password) > 30 || strlen($password) < 5) {
                array_push($error_array, "Your Password must be 5 to 30 characters");
            }

            if($password != $password2) {
                array_push($error_array, "Your Password do not match");
            }else {
                if(preg_match('/[^A-Za-z0-9]/', $password)) {
                    array_push($error_array, "Your Password can only contain english characters or numbers");
                }
            }



            //if error is empty 
            if(empty($error_array)) {
                $profile_pic = "assets/img/user.png";
                $status = 0;

                $sqlquery = "INSERT INTO Buyer(fullname,email,username,password,profileImage,status,dateCreated) VALUES('$fullname', '$email','$username', md5('$password'),'$profile_pic','$status','$date')";
                $querry = mysqli_query($con, $sqlquery);

                if($querry) {

                    //create session variables for session
                    
                    //$_SESSION['email'] = $email;
                    header("location: login.php");


                    //clear sesssion variables
                    // $_SESSION['email'] = "";
                    // $_SESSION['username'] = "";
                }

            }


        }
    
    
?>