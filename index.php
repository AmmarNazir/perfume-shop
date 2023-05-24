<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

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
                <a href="cart.php"> <i class="fas fa-shopping-cart"></i></a>
                <a href="account.html" style="text-decoration: none;"><i class="fas fa-user"></i></a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav> 
      <!-- Home -->
      <section id="home">
        <div class="container">
            <h4>NEW ARRIVALS</h4>
            <h1><span> Best Prices </span> This Season</h1>
            <p>Khushbu offers the best products for afordable prices</p>
            <button id="shopnow">Shop Now </button>
        </div>
      </section>
      <!--Brands-->
      <section id="brand" class="">
        <div class="row" > 
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpg">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand2.jpg">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand3.jpg">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand4.jpg">        
        </div>

      </section>
      <!--New-->
      <section id="new" class="w-100">
        <div class="row" p-0 m-0>
          <!--one-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/1.jpg" >
            <div class="details">
              <h2>Extremely Awesome Fregrance</h2>
              <button class="text-uppercase">Shop Now</button>
            </div>
          </div>
          <!--two-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/2.jpg" >
            <div class="details">
              <h2>Original Ood</h2>
              <button class="text-uppercase">Shop Now</button>
            </div>
          </div>
          
          <!--three-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/3.jpg" >
            <div class="details">
              <h2>Awesome Itr</h2>
              <button class="text-uppercase ">Shop Now</button>
            </div>
          </div>

        </div>
      </section>
      <!--Featured-->
      <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5 ">
          <h3>Our featured</h3>
          <hr>
          <p>Here you can check out our new featured products</p>
        </div>
        <div class="row mx-auto container-fluid">
          <?php include('server/get_featured_products.php'); ?>
          <?php while($row = $featured_products->fetch_assoc()){ ?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12 p-0">
          
            <img class="img-fluid mb-3" src="<?php echo $row['product_image']; ?>" >
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"> <?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
            <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn"> Buy Now</button></a>
          </div>          
          
          <?php } ?>
        </div>
      </section>
      <!--Banner-->
      <section id="banner" class="my-5 py-3">
        <div class="container">
          <h4>EXCLUSIVE SALE</h4>
          <h1>Spring Collection <br> UP to 30% OFF</h1>
          <button class="text-uppercase">shop now</button>
        </div>
      </section>

      <!--Mens product-->
      <section id="featured" class="my-5 ">

        <div class="container text-center mt-5 py-5 ">
          <h3>Men Products</h3>
          <hr>
          <p>Here you can check out our new Men products</p>
        </div>
        <div class="row mx-auto container-fluid">
          <div class="product text-center col-lg-3 col-md-4 col-sm-12 p-0">
            <img class="img-fluid mb-3" src="assets/imgs/men1.jpg" >
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"> Azure Hemani</h5>
            <h4 class="p-price">$199.9</h4>
            <button class="buy-btn"> Buy Now</button>
          </div>          
          <div class="product text-center col-lg-3 col-md-4 col-sm-12 p-0">
            <img class="img-fluid mb-3" src="assets/imgs/men2.jpg" >
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"> Coach Eu De</h5>
            <h4 class="p-price">$299.9</h4>
            <button class="buy-btn"> Buy Now</button>
          </div>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12 p-0">
            <img class="img-fluid mb-3" src="assets/imgs/men3.jpg " >
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"> Coach Open Road</h5>
            <h4 class="p-price">$199.9</h4>
            <button class="buy-btn"> Buy Now</button>
          </div>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12 p-0">
            <img class="img-fluid mb-3" src="assets/imgs/men4.jpg" >
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"> Epic Men</h5>
            <h4 class="p-price">$199.9</h4>
            <button class="buy-btn"> Buy Now</button>
          </div>
        </div>
      
      

      </section>
      <!--Womens product-->
      <section id="featured" class="my-5 ">
        <div class="container text-center mt-5 py-5 ">
          <h3>Women Products</h3>
          <hr>
          <p>Here you can check out our new Women products</p>
        </div>
        <div class="row mx-auto container-fluid">
          <div class="product text-center col-lg-3 col-md-4 col-sm-12 p-0">
            <img class="img-fluid mb-3" style="height: 200px;" src="assets/imgs/women1.jpeg" >
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"> Flower Bomi</h5>
            <h4 class="p-price">$199.9</h4>
            <button class="buy-btn"> Buy Now</button>
          </div>          
          <div class="product text-center col-lg-3 col-md-4 col-sm-12 p-0">
            <img class="img-fluid mb-3" style="height: 200px;" src="assets/imgs/women2.jpeg" >
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">  La Ve Est Belle</h5>
            <h4 class="p-price">$299.9</h4>
            <button class="buy-btn"> Buy Now</button>
          </div>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12 p-0">
            <img class="img-fluid mb-3" style="height: 200px;" src="assets/imgs/women3.jpeg " >
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"> Elizabeth</h5>
            <h4 class="p-price">$199.9</h4>
            <button class="buy-btn"> Buy Now</button>
          </div>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12 p-0">
            <img class="img-fluid mb-3" style="height: 200px;" src="assets/imgs/women4.jpeg" >
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">  Joy</h5>
            <h4 class="p-price">$199.9</h4>
            <button class="buy-btn"> Buy Now</button>
          </div>
        </div>
      </section>
      <!--Kids product-->
            <section id="featured" class="my-5 ">
              <div class="container text-center mt-5 py-5 ">
                <h3>Kids Products</h3>
                <hr>
                <p>Here you can check out our new Kids products</p>
              </div>
              <div class="row mx-auto container-fluid">
                <div class="product text-center col-lg-3 col-md-4 col-sm-12 p-0">
                  <img class="img-fluid mb-3" style="height: 200px;" src="assets/imgs/kid1.jpeg" >
                  <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <h5 class="p-name"> Flower Bomi</h5>
                  <h4 class="p-price">$199.9</h4>
                  <button class="buy-btn"> Buy Now</button>
                </div>          
                <div class="product text-center col-lg-3 col-md-4 col-sm-12 p-0">
                  <img class="img-fluid mb-3" style="height: 200px;" src="assets/imgs/kid2.jpeg" >
                  <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <h5 class="p-name">  La Ve Est Belle</h5>
                  <h4 class="p-price">$299.9</h4>
                  <button class="buy-btn"> Buy Now</button>
                </div>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12 p-0">
                  <img class="img-fluid mb-3" style="height: 200px;" src="assets/imgs/kid3.jpeg " >
                  <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <h5 class="p-name"> Elizabeth</h5>
                  <h4 class="p-price">$199.9</h4>
                  <button class="buy-btn"> Buy Now</button>
                </div>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12 p-0">
                  <img class="img-fluid mb-3" style="height: 200px;" src="assets/imgs/kid4.jpeg" >
                  <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <h5 class="p-name">  Joy</h5>
                  <h4 class="p-price">$199.9</h4>
                  <button class="buy-btn"> Buy Now</button>
                </div>
              </div>
            </section>

      <!--New Arrivalst-->
      <section id="featured" class="my-5 ">
        <div class="container text-center mt-5 py-5 ">
          <h3>New Arrivals</h3>
          <hr>
          <p>Here you can check out our new New Arrivals</p>
        </div>
        <div class="row mx-auto container-fluid">
          <div class="product text-center col-lg-3 col-md-4 col-sm-12 p-0">
            <img class="img-fluid mb-3" style="height: 200px;" src="assets/imgs/newar1.jpeg" >
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"> Flower Bomi</h5>
            <h4 class="p-price">$199.9</h4>
            <button class="buy-btn"> Buy Now</button>
          </div>          
          <div class="product text-center col-lg-3 col-md-4 col-sm-12 p-0">
            <img class="img-fluid mb-3" style="height: 200px;" src="assets/imgs/newar2.jpeg" >
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">  La Ve Est Belle</h5>
            <h4 class="p-price">$299.9</h4>
            <button class="buy-btn"> Buy Now</button>
          </div>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12 p-0">
            <img class="img-fluid mb-3" style="height: 200px;" src="assets/imgs/newar3.jpeg " >
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"> Elizabeth</h5>
            <h4 class="p-price">$199.9</h4>
            <button class="buy-btn"> Buy Now</button>
          </div>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12 p-0">
            <img class="img-fluid mb-3" style="height: 200px;" src="assets/imgs/newar4.jpeg" >
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">  Joy</h5>
            <h4 class="p-price">$199.9</h4>
            <button class="buy-btn"> Buy Now</button>
          </div>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>