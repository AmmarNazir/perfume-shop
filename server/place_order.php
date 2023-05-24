<?php   
session_start();
include('connection.php');
if(isset($_POST['place_order'])){

    //get user info and store in database
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $order_cost = $_SESSION['total'];
    $order_status = "on_hold";
    $user_id = 1;
    $order_date = date('y-m-d H:i:s');


    $stmt = $conn->prepare("INSERT INTO orders (order_cost, order_status, user_id, user_phone, city, user_address, order_date)
                        VALUES         (?, ?, ?, ?, ?, ?, ?);");

    $stmt->bind_param('isiisss', $order_cost, $order_status, $user_id, $phone, $city, $address, $order_date);


    $stmt->execute();

    //issue new order and store order into database

    $order_id = $stmt->insert_id;




    //get products from cart(from session )[4(product id => [ product information ])]
    foreach($_SESSION['cart'] as $key => $value){
        $product = $_SESSION['cart'][$key];

        $product_id = $product['product_id'];
        $product_name = $product['product_name'];
        $product_price = $product['product_price'];
        $product_image = $product['product_image'];
        $product_quantity = $product['product_quantity'];

    //store each sigle item in order_item database

        $stmt1 = $conn->prepare("INSERT INTO orders_items(order_id, product_id, product_name, product_image, product_quantity, product_price, user_id, order_date)
                                VALUE (?, ?, ?, ?, ?, ?, ?, ? )");

        $stmt1->bind_param('iissiiis', $order_id, $product_id, $product_name, $product_image, $product_quantity, $product_price, $user_id, $order_date);

        $stmt1->execute();
    }


    //remove everything from cart---> DELAY UNTIL PAYMENT IS DONE

    //unset($_SESSION['cart']);







    //inform user whether every thing is fine or their is some problem

    header('location: ../payment.php?order_status=order placed successfully');



}else{

} 
?>