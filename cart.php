<?php 
session_start();
if(isset($_POST['add_to_cart'])){
    //if user already had added product
    if(isset($_SESSION['cart'])){

        $_products_array_ids = array_column($_SESSION['cart'], "product_id"); ////shows product id  of products added into the cart
//checks if product already added or not 

        if( !in_array($_POST['product_id'], $_products_array_ids)){
    
    
        $product_id = $_POST['product_id'];

    
            $product_array = array(
                            'product_id' => $product_id,
                            'product_name' => $product_name,
                            'product_price' => $product_price,
                            'product_image' => $product_image,
                            'product_quantity' => $product_quantity,
            );

            $_SESSION['cart'][$product_id] = $product_array;
    
    
    
//product already added

        }else{

            echo '<script> alert("product has been already added");</script>';
//
        } 

//if user want to add 1st product
    }else{
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];


        $product_array = array(
                        'product_id' => $product_id,
                        'product_name' => $product_name,
                        'product_price' => $product_price,
                        'product_image' => $product_image,
                        'product_quantity' => $product_quantity,
                    );
        $_SESSION['cart'][$product_id] = $product_array;

    }

   //calculate total
   calculateTotalCart();
//remove product from th cart
}else if(isset($POST['remove_product'])){

        $product_id = $_POST['product_id'];
        unset($_SESSION['cart'][$product_id]);

        //calculate total
        calculateTotalCart();

    }


else if(isset($_POST['edit_quantity'])){


  //we get id and quantity from the form
  $product_id = $_POST['product_id'];
  $product_quantity = $_POST['product_quantity'];

//get the product array from the session
  $product_array = $_SESSION['cart'][$product_id];
  //update product quantity
  $product_array['product_quantity'] = $product_quantity;
  //return array back to its place
  $_SESSION['cart'][$product_id] = $product_array;
  //calculate total

  calculateTotalCart();

} 


else{
   // header('location: index.php');

}



function calculateTotalCart(){

  foreach($_SESSION['cart'] as $key=> $value){
    $product = $_SESSION['cart'][$key];

    $price = $product['product_price'];
    $quantity = $product['product_quantity'];

    $total = $total + ($price * $quantity);
  }
  $_SESSION['total'] = $total;
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

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


<!--Cart-->
<section class="cart container my-5 py-5">
    <div class="container mt-5">
        <h2 class="font-weight-bolde">Your Cart</h2>
    </div>
    <table class="mt-5 pt-5">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        <?php foreach($_SESSION['cart'] as $key => $value){ ?>
        <tr>
            <td>
                <div class="product-info">
                <img src="<?php echo $value['product_image']; ?>">
                    <div class="title-price"> 
                        <p><?php echo $value['product_name']; ?></p>
                        <small><span>$</span> <?php echo $value['product_price']; ?></small>
                        <br>
                        <form method="POST" action="cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                        <input type="submit" class="remove-btn" name="remove_product" value="remove" style="text-decoration: none; color: orange; background-color: white; border: none; width: 100%;">
                        </form>
                    </div>
                </div>
            </td>
            <td>
                <form method="POST" action="cart.php">
                <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']; ?>">
                <input type="submit" class="edit-btn" value="edit" name="edit_quantity" style="text-decoration: none; color: orange; background-color: white; border: none; width: 100%;">
                </form>
            </td>
            <td>
                <span class="currency">$</span>
                <span class="price"><?php echo $value['product_quantity'] * $value['product_price']; ?></span>
            </td>
        </tr>
        <?php } ?>

    </table>

    <div class="cart-total">
            <table>
                <!-- <tr>
                    <td>Subtotal</td>
                    <td>$199.9</td>
                </tr> -->
                <tr>
                    <td>Total</td>
                    <td>$ <?php  echo $_SESSION['total']; ?></td>
                </tr>
            </table>
        </div>
        <div class="checkout-container">
          <form  method="POST" action="checkout.php">

          <input type="submit" class="checkout-btn" value="checkout" name="checkout" >
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
  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>