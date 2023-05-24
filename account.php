<?php

session_start();

if(!isset($_SESSION['logged_in'])){

  header('location: login.php');

}






?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>

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
      <!--Account-->
      <section class="my-5 py-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 mt-5 col-lg-6 col-md-12 col-sm-12">
                <h3 class="font-weight-bold">Account Info</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Name <span>Ammar</span></p>
                    <p>Email <span>Ammar@email.com</span></p>
                    <p><a href="#" id="order-btn">Your Order</a></p>
                    <p><a href="#" id="logout-btn">Logout</a></p>

                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <form id="account-form">
                    <h3>change password</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="account-password" name="password" placeholder="password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" id="account-password-confirm" name="confirm-password" placeholder="password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="change password" class="btn" id="change-pass-btn">
                    </div>
                </form>
            </div>
        </div>
      </section>



      



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
</body>
    