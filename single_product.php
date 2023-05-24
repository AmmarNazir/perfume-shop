<?php


include('server/connection.php');

if(isset($_GET['product_id'])){

$product_id = $_GET['product_id'];

  $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
  $stmt->bind_param("i", $product_id);

  $stmt->execute();
  
  $product = $stmt->get_result();

}
else{
  header('location:index.php');
}



?>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Product </title>

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
<!--single product-->
      <section class=" container single-product my-5 pt-3">
        <div class="row mt-5">
        <?php while($row = $product->fetch_assoc()) {?>



            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="<?php echo $row['product_image']; ?>"  id="main-img">
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="<?php echo $row['product_image']; ?>" width="100%" class="small-img" >
                    </div>
                    <div class="small-img-col">
                        <img src="<?php echo $row['product_image2']; ?>" width="100%" class="small-img" >
                    </div>
                    <div class="small-img-col">
                        <img src="<?php echo $row['product_image3']; ?>" width="100%" class="small-img" >
                    </div>
                    <div class="small-img-col">
                        <img src="<?php echo $row['product_image4']; ?>" width="100%" class="small-img" >
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                    <h6>Luxury perfume</h6>
                    <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
                    <h2>$<?php echo $row['product_price']; ?></h2>
        <form method="POST" action="cart.php">
            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
            <input type="hidden" name="product_Image" value="<?php echo $row['product_image']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
            <input type="number" name="product_quantity" value="1">
            <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>

        </form>
                    <h4 class="mt-5 mb-5">Product Details</h4>
                    <span><?php echo $row['product_description']; ?> </span>
            </div>
            

          <?php }  ?>
        </div>
      </section>

      <!--related products-->
      <section id="related-products" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5 ">
          <h3>Related Products</h3>
        </div>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_featured_products.php'); ?>
          <?php while($row = $featured_products->fetch_assoc()){ ?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12 p-0">
            <img class="img-fluid mb-3" src = "<?php echo $row['product_image']; ?>" >
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
            <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn"> Buy Now</button></a>
          </div>

          <?php } ?>          
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
    
    <script>
    var mainImg =  document.getElementById("main-img");
    var smallImg = document.getElementsByClassName("small-img");

    for(let i=0; i<4; i++){

        smallImg[i].onclick = function(){
        mainImg.src = smallImg[i].src;
        
    }

    }
    </script>
</body>
</html>