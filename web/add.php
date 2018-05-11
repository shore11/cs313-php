<?php
    // cart has many bags
    $cart = array();
    $_SESSION["cart"] = $cart;

    $item = $_POST["item"];
    $price = $_POST["price"];

    // a bag has an item and its price
    $bag = array($item, $price);
    array_push($cart, $bag);

    echo '<script>window.location.href="prove3.php";</script>';
    exit();
?>