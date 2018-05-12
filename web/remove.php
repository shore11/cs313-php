<?php
    session_start();

    $index = $_POST['index'];
    echo $index;
    array_splice($_SESSION['cart'],$index,1);
    var_dump($_SESSION['cart']);
    echo '<script>window.location.href="viewCart.php";</script>';
?>