<?php
   session_start();
?>
<!DOCTYPE html>

<html>
    <body>
        <p><?php
            print_r($_SESSION['cart']);
            ?></p>
    </body>
</html>