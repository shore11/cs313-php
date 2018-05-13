<?php
    session_start();  
?>
<!DOCTYPE html>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="prove3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title>Browse</title>
        <link rel="icon" href="rims.png"/>
    </head>
    <body class="back">
        <header>Every thing you need to be ready for the disco!</header>
        <div class="container">
        <!-- row 1 -->
        <div class="row"><div class="col-lg-4"><div class="col-lg-12">
            <img class="picture" src="pics/boombox.jpg">
        <!-- BUTTON -->
            <form method="post" action="add.php" >
                <p>Boom Box Price: $50.00</p>
                <input type="hidden" name="price" value="50.00">
                <input type="hidden" name="item" value="Boom Box">
                <input class="sub" type="submit" value="+ Add To Cart">
            </form>
                </div></div>
            <div class="col-lg-4"><div class="col-lg-12">
                    <img class="picture" src="pics/headband.jpg">
        <!-- BUTTON -->
            <form method="post" action="add.php" >
                <p>Head Band Price: $5.43</p>
                <input type="hidden" name="price" value="5.43">
                <input type="hidden" name="item" value="Head Band">
                <input class="sub" type="submit" value="+ Add To Cart">
            </form>
                </div></div>
            <div class="col-lg-4"><div class="col-lg-12">
                   <img class="picture" src="pics/earings.jpg">
        <!-- BUTTON -->
            <form method="post" action="add.php" >
                <p>Hoop Earings Price: $1.33</p>
                <input type="hidden" name="price" value="1.33">
                <input type="hidden" name="item" value="Hoop Earings">
                <input class="sub" type="submit" value="+ Add To Cart">
            </form>
                </div></div></div>
    <!-- row 2 -->
        <div class="row"><div class="col-lg-4"><div class="col-lg-12">
                    <img class="picture" src="pics/glasses.jpg">
        <!-- BUTTON -->
            <form method="post" action="add.php" >
                <p>Glasses Price: $2.33</p>
                <input type="hidden" name="price" value="2.33">
                <input type="hidden" name="item" value="Glasses">
                <input class="sub" type="submit" value="+ Add To Cart">
            </form>
                </div></div>
            <div class="col-lg-4"><div class="col-lg-12">
                    <img class="picture" src="pics/shirt.jpg">
        <!-- BUTTON -->
            <form method="post" action="add.php" >
                <p>Shirt Price: $8.75</p>
                <input type="hidden" name="price" value="8.75">
                <input type="hidden" name="item" value="Shirt">
                <input class="sub" type="submit" value="+ Add To Cart">
            </form>
                </div></div>
            <div class="col-lg-4"><div class="col-lg-12">
                   <img class="picture" src="pics/bellPants.jpg">
         <!-- BUTTON -->
            <form method="post" action="add.php" >
                <p>Bell Bottom Pants Price: $10.25</p>
                <input type="hidden" name="price" value="10.25">
                <input type="hidden" name="item" value="Bell Bottom Pants">
                <input class="sub" type="submit" value="+ Add To Cart">
            </form>        
                </div></div></div>
        <!-- row 3 -->
        <div class="row"><div class="col-lg-4"><div class="col-lg-12">
                  <img class="picture" src="pics/discoBall.jpg">
        <!-- BUTTON -->
            <form method="post" action="add.php" >
                <p>Disco Ball Price: $30.00</p>
                <input type="hidden" name="price" value="30.00">
                <input type="hidden" name="item" value="Disco Ball">
                <input class="sub" type="submit" value="+ Add To Cart">
            </form>
                </div></div>
            <div class="col-lg-4"><div class="col-lg-12">
                    <img class="picture" src="pics/rollerblades.jpg">
        <!-- BUTTON -->
            <form method="post" action="add.php" >
                <p>Roller Blades Price: $25.00</p>
                <input type="hidden" name="price" value="25.00">
                <input type="hidden" name="item" value="Roller Blades">
                <input class="sub" type="submit" value="+ Add To Cart">
            </form>
                </div></div>
            <div class="col-lg-4"><div class="col-lg-12">
                    <img class="picture" src="pics/afro.jpg">
        <!-- BUTTON -->
            <form method="post" action="add.php" >
                <p>Afro Price: $9.11</p>
                <input type="hidden" name="price" value="9.11">
                <input type="hidden" name="item" value="Afro">
                <input class="sub" type="submit" value="+ Add To Cart">
            </form>
                </div></div></div>
     <!-- row 4 -->
            <div class="row"><div class="col-lg-5"><div class="col-lg-12">
                <!-- BUTTON -->
            <form method="post" action="viewCart.php" >
                <input class="sub" type="submit" value="See Cart">
            </form>
                </div></div>
                <div class="col-lg-5"><div class="col-lg-12">
                <!-- BUTTON -->
            <form method="post" action="checkOut.php" >
                <input class="sub" type="submit" value="Check out">
            </form>
                </div></div>
            </div>
        </div>
    </body>
</html>