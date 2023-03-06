<?php 
include("includes/config.php");
include("includes/form_handler/register_handler.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soko Mkononi</title>
    <link rel="stylesheet" href="assets/assets/css/bootstrap.css">
</head>
<body>
    
    <div class="row">
        <div class="col-md-3">

        </div>

        <div class="col-md-6">
            <h1 class="text-center pt-5" style="color: #6e9900; font-weight: bold;">SOKO <span class="text-dark">Mkononi</span></h1>
            <div class="card text-dark" style="box-shadow: 5px 5px 10px 10px #f2f2f2;">
                <div class="card-header">
                    <h4 class="card-title">User Registration</h4>
                </div>
              <div class="card-body">
            
                <form action="" method="post">
                        <div class="form-group">
                          <label for="">Fullname</label>
                          <input type="text" name="fullname" id="" class="form-control" placeholder="Eg: Kelvin Aron" aria-describedby="helpId">
                        
                        </div>

                        <div class="form-group">
                          <label for="">Username</label>
                          <input type="text" name="username" id="" class="form-control" placeholder="Eg: kevoo" aria-describedby="helpId">
                          <small id="helpId" style="color: red;">
                              <?php if(in_array("Your username must be between 4 and 16 characters", $error_array)) echo "Your username must be between 4 and 16 characters";
                                            else if(in_array("Username is already in use", $error_array)) echo "Username is already in use";
                                ?>
                          </small>
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" id="" class="form-control" placeholder="Eg: kevoo@example.com" aria-describedby="helpId"> 
                            <small id="helpId" style="color: red;">
                              <?php if(in_array("Invalid email format", $error_array)) echo "Invalid email format";
                                            else if(in_array("email is already in use", $error_array)) echo "email is already in use";
                                ?>
                            </small>
                          </div>

                          <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control" placeholder="***" aria-describedby="helpId">
                    
    
                          </div>

              

                          <div class="form-group">
                            <label for="">Comfirm Password</label>
                            <input type="password" name="comfirmPassword" id="" class="form-control" placeholder="***" aria-describedby="helpId">
                    
                            <small id="helpId" style="color: red;">
                                  <?php 
                                                  if(in_array("Your Password do not match", $error_array)) echo "Your Password do not match";
                                                  else if(in_array("Your Password can only contain english characters or numbers", $error_array)) echo "Your Password can only contain english characters or numbers";
                                                  else if(in_array("Your Password must be 5 to 30 characters", $error_array)) echo "Your Password must be 5 to 30 characters";
                                  ?>
                            </small>
                          </div>

                          <div class="form-group">
                            
                            <button style="background-color: #6e9900; color: #fff; width: 100%; box-shadow: 5px 5px 10px #ccc;" name="register" type="submit" class="btn">Register</button>
                            
                          </div>

                    </form>
                  <div class="form-group">
                    <p id="helpId" class="text-dark">If you have account click <a href="login.php">Login</a></p>
                    <a href="index.php">Home</a>
                  </div>
              </div>
            </div>
        </div>

        <div class="col-md-3">
            
        </div>
    </div>
</body>
</html>