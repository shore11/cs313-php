<?php
   session_start();
?>
<!DOCTYPE html>

<html>
    <body>
        <p><?php
            var_dump($_SESSION['cart']);
            print_r($_SESSION['cart']);
            echo $_SESSION['cart'][0];
            ?></p>
    </body>
</html>