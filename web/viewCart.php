<?php
   session_start();
?>
<!DOCTYPE html>

<html>
    <body>
        <p><?php
            var_dump($_SESSION['cart']);
            print_r($_SESSION['cart']);
            ?></p>
    </body>
</html>