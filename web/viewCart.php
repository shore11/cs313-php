<?php
   session_start();
?>
<!DOCTYPE html>

<html>
    <body>
        <p><?php
            foreach($_SESSION["cart"] as $item)
            echo "this is" . $item[0]. "what you got" 
            ?></p>
    </body>
</html>