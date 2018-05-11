<?php
    session_start();
     if (!isset($_SESSION['cart'])){
         $_SESSION['cart'] = array();
     }
    $item = $_POST['item'];
    $price = $_POST['price'];

    // a bag has an item and its price
    $bag = array($item, $price);
    array_push($_SESSION['cart'],$bag);

    echo $item;
    echo $price;
    var_dump($_SESSION['cart']);
    echo '<script>window.location.href="prove3.php";</script>';
   // exit();
?>