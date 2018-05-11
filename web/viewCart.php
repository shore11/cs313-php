<?php
   session_start();
?>
<!DOCTYPE html>

<html>
    <body>
        <p><?php echo $_SESSION['cart'][0][0] ?></p>
    </body>
</html>