<?php
    session_start();
     if (!isset($_SESSION['cart'])){
         $_SESSION['cart'] = array();
     }
    $item = $_POST['item'];
    $price = $_POST['price'];

    // a bag has an item and its price
    $bag = array($item, $price);
    // cart has many bags
    array_push($_SESSION['cart'],$bag);

    // set total if they havent gone to cart
    if (!isset($_SESSION['total'])){
            $sum = 0;
             foreach($_SESSION['cart'] as $total){
                $sum += $total[1];
             }
               $_SESSION['total'] = $sum;
    }
    echo '<script>window.location.href="prove3.php";</script>';
   // exit();
?>