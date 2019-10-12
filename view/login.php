<?php
// Start the session
session_start();
include_once("../model/entity/user.php");
$information ="";
if (isset($_SESSION["user"]))
  header("location:index.php");
if ($_SERVER["REQUEST_METHOD"]=="POST"){
  $userName = $_REQUEST["userName"];
  $pw = $_REQUEST["pw"];
  $user = User::authentication($userName, $pw);
  if ( user == null)
      $infomation = ("Ten dang nhap hoac mat khau khong dung");
      else {
          // $information ="chao" . $user->fullName;
          // $_SESSION["user"] = $user;
          $_SESSION["user"] = serialize($user);
          header("location:index.php");
      }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Login</title>
  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
</head>
<body class="bg-dark"> 
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form method="POST" action="login.php">
              <div class="form-label-group">
                <input type="email" name="userName" id="userName" class="form-control" placeholder="Email address" required autofocus>
                <label for="userName">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="pw" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <?php if (strlen($information) != 0){?>
                  <div class="alert alert-danger">
                    <?php echo $information;?>
                  </div>
              <?php }?>
              <div class="text-right">
			            <a class="d-block small mt-3" href="#">Register an Account</a>
			            <a class="d-block small" href="#">Forgot Password?</a>
		          </div>
              
           
            </form>
            <hr class="my-4">
              <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
              <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
</html>
<?php

