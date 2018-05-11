<?php
   session_start();
?>
<!DOCTYPE html>

<html>
    <body>
        <p><?php
            if(isset($_SESSION['cart'])){
                foreach($_SESSION["cart"] as $item){
                    echo $item ;
                }
            }else{
                echo "what the";
            }
            ?></p>
    </body>
</html>