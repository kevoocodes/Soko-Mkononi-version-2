<?php 
error_reporting(0);
include("includes/config.php");  //connecting to the database 
include("includes/form_handler/login_handler.php");  //login handler
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
                    <h4 class="card-title">User Login</h4>
                    <p class="text-danger">
                           <?php if(in_array("**Email or password was incorrect", $error_array)) echo  "**Email or password was incorrect"; ?>
                    </p>
                </div>
              <div class="card-body">
            
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" id="" class="form-control" placeholder="Eg: kevoo@example.com" aria-describedby="helpId"> 
                      </div>

                      <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control" placeholder="***" aria-describedby="helpId">
                      </div>


                      <!-- <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                          Remember Me
                        </label>
                      </div> -->


                      <div class="form-group">
                        <button name="login" style="background-color: #6e9900; color: #fff; width: 100%; box-shadow: 5px 5px 10px #ccc;" type="submit" class="btn">Login</button>
                        
                      </div>
                </form>

                  <div class="form-group">
                    <p id="helpId" class="text-dark">If you Don't have Account Please click <a href="register.php">Register</a></p>
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