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
                $index = 0;
                foreach($_SESSION['cart'] as $bag){
                  <form method="post" action="remove.php">
                    <li class="list-group-item">$bag[0]<input type="hidden" name="index" value="$index"><span class="badge">$bag[1]</span> <span class="badge"><button type="submit" class="btn btn-danger btn-xs"> Click To Remove </button></span></li>
                  </form>
                $index++;
                }
            ?>
            <form method="post" action="remove.php">
            <li class="list-group-item">$bag[0]<input type="hidden" name="index" value="$index"><span class="badge">$bag[1]</span> <span class="badge"><button type="submit" class="btn btn-danger btn-xs"> Click To Remove </button></span></li>
            </form>
        </ul>
        </div>
        <div class="container">
             <!-- row 1 -->
            <div class="row"><div class="col-lg-5"><div class="col-lg-12">
                <!-- BUTTON -->
            <form method="post" action="prove3.php" >
                <input class="sub" type="submit" value="Continue Shopping">
            </form>
                </div></div>
                <div class="col-lg-5"><div class="col-lg-12">
                <!-- BUTTON -->
            <form method="post" action="" >
                <input class="sub" type="submit" value="Check out">
            </form>
                </div></div>
            </div>
        </div>
    </body>
</html>