<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="index.css">
        <title>Home Page</title>
        <link rel="icon" href="rims.png"/>
    </head>
    <body>
        <div class="wrapimage">
            <h3 class="imagetitle">I would like to own this car!</h3>
            <img height="150" width="280" src="dart.jpg" alt="Dart Demon Picture" /></div>
        <div class="assignlist">
            <ul>
                <li><a href="prove3.html">Shopping</a></li>
                <li><a href="assign2">Future assignment</a></li>
                <li><a href="assign3">Future assignment</a></li>
                <li><a href="assign4">Future assignment</a></li>
                <li><a href="assign5">Future assignment</a></li>
                <li><a href="assign6">Future assignment</a></li>
            </ul>
        </div>
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
        echo "<h3 class='bday'>Were you born on $month / $day / $year ?</h3>"
        ?> 
    </body>
</html>