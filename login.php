<?php 

session_start();

include('server/connection.php');

if(isset($_SESSION['logged_in'])){
  header('location: account.php');
  exit;
  
}


if(isset($_POST['login_btn'])){
  $email = $_POST['email'];
  $password = md5($_POST['password']);



 $stmt =  $conn->prepare("SELECT  user_id, user_name, user_email, user_password FROM users where user_email = ? AND user_password = ? LIMIT 1");
 $stmt->bind_param('ss', $email, $password);

 if($stmt->execute()){

  $stmt->bind_result($user_id, $user_name, $user_email, $password);
  $stmt->store_result();

    if($stmt->num_rows() == 1){

      $stmt->fetch();

      $_SESSION['user_id'] = $user_id;
      $_SESSION['user_name'] = $user_name;
      $_SESSION['user_email'] = $user_email;
      $_SESSION['logged_in'] = true;

      header('location: account.php? message=logged in successfully');


    }else{


      header('location: login.php?error=couldnot verify your account');



    }

 }else{

  //error
  header('location: login.php?error=something went wrong ');
 }

}



?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Nav Bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
        <div class="container">
        <img class="logo" src="assets/imgs/log.png">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse nav-button" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.html">Shop</a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" href="contact.html">contac us</a>
              </li>

              </li>
              <li class="nav-item">
                <a href="cart.html"> <i class="fas fa-shopping-cart"></i></a>
                <a href="account.html" style="text-decoration: none;"><i class="fas fa-user"></i></a>
              </li>

            </ul>
            
          </div>
        </div>
      </nav> 

      <!--Login-->
      <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Login</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
          <p style="color:red" class="text-center"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
            <form id="login-form" method="POST" action="login.php">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="login-btn" name="login_btn" value="login">
                </div>
                <div class="form-group">
                    <a id="register-url" href="register.php" class="btn"> Don't have account? Register</a>
                </div>
            </form>
        </div>

      </section>


      <!--Footer-->
<footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5">
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <img src="assets/imgs/log.png" >
        <p class="pt-3" style="color: whitesmoke;"> We provide the best products for the most affordable prices </p>
      </div>
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h3 class="pb-2" style="color: whitesmoke;">Featured</h3>
        <ul class="text-uppercase">
          <li><a href="#">Men</a></li>
          <li><a href="#">Women</a></li>
          <li><a href="#">Kids</a></li>
          <li><a href="#">New Arrivals</a></li>
          <li><a href="#">Our Featured </a></li>
        </ul>
        <br><br>
        <h5>Khushbu <span>&copy;</span> 2023 All Rights Reserved</h5>
      </div>
      <div  class="footer-one col-lg-3 col-md-6 col-sm-12" style="color: whitesmoke;">
        <h3  class="pb-2">Contact Us</h3>
        <h4>Address</h4>
        <h5>karachi company, Islamabad</h5>
        <h4>Phone</h4>
        <h5>051-12345678</h5>
        <h4>E-mail</h4>
        <h5>khushbu12@gmail.com</h5>
  
      </div>
      <div class="footer-one icons col-lg-3 col-md-6 col-sm-12">
        <i class="fab fa-facebook-f " style="color: whitesmoke; " href="#"></i><br><br>
        <i class="fab fa-twitter" style="color: whitesmoke;"  href="#"></i><br><br>
        <i class="fab fa-instagram" style="color: whitesmoke;"  href="#"></i><br><br>
        <i class="fab fa-tiktok" style="color: whitesmoke;"  href="#"></i>
  
      </div>
    </div>
  </footer>
