<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="index.css">
        <title><img src="rims.png">Home Page</title>
    </head>
    <body>
        <!--attempt to guess users birthday-->
        <?php
        $month = mt_rand(1,12);
        $day = null;
        $year = mt_rand(1980, 2018);
        
        if ($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8
           || $month == 10|| $month == 12){
            $day = mt_rand(1, 31);
        } elseif ($month == 2) {
            $day = mt_rand(1, 28);
        } else {
            $day = mt_rand(1, 30);
        }
        ?> 
    </body>
</html>