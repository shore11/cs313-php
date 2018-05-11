<?php
    session_start();
    $item = $_POST['item'];
    $price = $_POST['price'];

    // a bag has an item and its price
    //$bag = array($item, $price);
    array_push($_SESSION['cart'],$_POST['item'],$_POST['price']);

    echo '<script>window.location.href="prove3.php";</script>';
   // exit();
?>