<?php 
session_start();
if(isset($_SESSION['user_id'])){
  header('Location:index.php');
  die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="./assets/img/AT-pro-logo.png"/>
  <title>DioneTech</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"  />
  <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
  <div class="container">
   <!-- Login Form Start-->
    <div class="row justify-content-center wrapper" id="login-box">
      <div class="col-lg-10 my-auto">
        <div class="card-group myShadow">
          <div class="card rounded-left p-4" style="flex-grow:1.4;">
            <h1 class="text-center font-weight-bold text-primary">Sign in to Account</h1>
            <hr class="my-3">
            <form action="#" method="post" class="px-3" id="login-form">
              <div id="loginAlert"></div>

              <div class="input-group input-group-lg form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text rounded-0">
                    <i class="fas fa-user-circle fa-lg"></i>
                  </span>
                </div>
                <input type="text" name="username" class="form-control rounded-0" id="username" placeholder="Username" required value="<?php if(isset($_COOKIE['username'])){ echo $_COOKIE['username'];}?>">
              </div>
              <div class="input-group input-group-lg form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text rounded-0">
                    <i class="fas fa-key fa-lg"></i>
                  </span>
                </div>
                <input type="password" name="password" class="form-control rounded-0" id="password" placeholder="Password" required value=" <?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];}?>">
              </div>
              <div class="form-group">
                <div class="custom-control custom-checkbox float-left">
                  <input type="checkbox" name="rem" id="customCheck" class="custom-control-input"  <?php if(isset($_COOKIE['password'])){ echo 'checked';}?> >
                  <label for="customCheck" class="custom-control-label">Remember me</label>
                </div>
                <div class="forgot float-right">
                  <a href="#" id="forgot-link">Forgot Password?</a>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="form-group">
                <input type="submit" value="Sign In" class="btn btn-primary btn-lg btn-block myBtn" id="login-btn">
              </div>
            </form>
          </div>
          <div class="card justify-content-center rounded-right myColor p-4">
            <h1 class="text-center font-weight-bold text-white">Hello Friends!</h1>
            <hr class="my-3 bg-light myHr">
            <p class="text-center font-weight-bolder text-light lead">
              Enter your personal details and start your journey with us!
            </p>
            <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="register-link">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
   <!-- Login Form End-->

   <!-- Register Form End-->
      <div class="row justify-content-center wrapper" id="register-box" style="display:none;">
        <div class="col-lg-10 my-auto">
          <div class="card-group myShadow">
            <div class="card justify-content-center rounded-left myColor p-4">
              <h1 class="text-center font-weight-bold text-white">Welcome Back!</h1>
              <hr class="my-3 bg-light myHr">
              <p class="text-center font-weight-bolder text-light lead">
                To keep connected with us please login with your personal info.
              </p>
              <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="login-link">Sign In</button>
            </div>
            <div class="card rounded-right p-4" style="flex-grow:1.4;">
              <h1 class="text-center font-weight-bold text-primary">Create Account</h1>
              <hr class="my-3">
              <form action="#" method="post" class="px-3" id="register-form">

                <div id="regAlert">
                </div>

                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0">
                      <i class="far fa-user fa-lg"></i>
                    </span>
                  </div>
                  <input type="text" name="name" class="form-control rounded-0" id="name" placeholder="Full Name" required>
                </div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0">
                     <i class="far fa-user fa-lg"></i>
                    </span>
                  </div>
                  <input type="text" name="username" class="form-control rounded-0" id="rusername" placeholder="UserName" required>
                </div>

                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0">
                      <i class="fas fa-key fa-lg"></i>
                    </span>
                  </div>
                  <input type="password" name="password" class="form-control rounded-0" id="rpassword" placeholder="Password" required minlength="5">
                </div>

                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0">
                      <i class="fas fa-key fa-lg"></i>
                    </span>
                  </div>
                  <input type="password" name="cpassword" class="form-control rounded-0" id="cpassword" placeholder="Confirm Password" required minlength="5">
                </div>

                <div class="form-group">
                  <div id="passError" class="text-danger font-weight-bolb"></div>
                </div>

                <div class="form-group">
                  <input type="submit" value="Sign Up" class="btn btn-primary btn-lg btn-block myBtn" id="register-btn">
                </div>
              </form>
            </div>
          
          </div>
        </div>
    </div>
   <!-- Register Form End-->

   <!-- Forgot Password Form Start-->
    <div class="row justify-content-center wrapper" id="forgot-box" style="display:none;">
      <div class="col-lg-10 my-auto">
        <div class="card-group myShadow">

        <div class="card justify-content-center rounded-left myColor p-4">
            <h1 class="text-center font-weight-bold text-white">Reset Password</h1>
            <hr class="my-3 bg-light myHr">
            <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="back-link">Back</button>
          </div>

          <div class="card rounded-right p-4" style="flex-grow:1.4;">
            <h1 class="text-center font-weight-bold text-primary">Forgot Your Password</h1>
            <hr class="my-3">
            <p class="lead text-center text-secondary">
              To reset your password enter the registered e-mail address and we will send you the rest instructions on our e-mail!
            </p>
            <form action="#" method="post" class="px-3" id="forgot-form">
              <div id="forgotAlert"></div>
              <div class="input-group input-group-lg form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text rounded-0">
                    <i class="far fa-envelope fa-lg"></i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control rounded-0" id="femail" placeholder="E-mail" required>
              </div>
              
              <div class="form-group">
                <input type="submit" value="Reset Password" class="btn btn-primary btn-lg btn-block myBtn" id="forgot-btn">
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
   <!-- Forgot Password Form End-->


  </div><!-- End container div-->


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js" ></script>
<script src="js/login.js"></script>


</body>
</html>