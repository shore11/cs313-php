<?php
  session_start();
?>

<!DOCTYPE>
<html>
    <head>
        <title>Confirmation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="prove3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
        <ul class="list-group" >
            <li class="list-group-item">Your Oder is as Follows</li>
             <!-- loop through cart and dsiplay contents each in own line -->
            <?php
                foreach($_SESSION['cart'] as $bag){
                 echo '<li class="list-group-item">'.$bag[0].'</li>';
                }
            ?>
            <li class="list-group-item">Total Amount Paid:<span class="badge">$<?php echo $_SESSION['total']; ?></span></li>
        </ul>
            <ul class="list-group" >
                <li class="list-group-item">
                    <?php 
echo "Being Shipped to: " . $_POST['name'] . "</br>" . $_POST['streetAddress'] . "</br>" . $_POST['city'] . ", " $_POST['stat'];
                    ?>
                </li>
            </ul>
        </div>
    </body>
</html>