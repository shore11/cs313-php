<?php
   session_start();
   //$_SESSION['cart'][0][1]
   // first index is the bag, second is the item
?>
<!DOCTYPE html>

<html>
    <head>
        <title>View Cart</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="prove3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body class="bviewcart">
        <div class="box">
        <ul class="list-group">
            <?php
                foreach($_SESSION['cart'] as $bag){
                  echo "<li class='list-group-item'>$bag[0]<span class='badge'>$bag[1]</span></li>";
                }
            ?>
            <li class="list-group-item">Item<span class="badge">2</span> </li>
            <li class="list-group-item">Item<span class="badge">2</span> </li>
        </ul>
        </div>
    </body>
</html>