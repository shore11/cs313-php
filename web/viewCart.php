<?php
   session_start();
?>
<!DOCTYPE html>

<html>
    <body>
        <p><?php
            foreach($_SESSION["cart"] as $item)
            echo $item . "what you got" ;
            ?></p>
    </body>
</html>