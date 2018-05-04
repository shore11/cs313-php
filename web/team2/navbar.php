<ul>
    <?php
    $url = $_SERVER['REQUEST_URI'];
    $end = end(explode('/', $url));
    $class1 = "";
    $class2 = "";
    $class3 = "";
    if ($end == 'about-us.php'){
        $class1 = "active";
    } elseif ($end == 'login.php'){
        $class3 = "active";
    } elseif ($end == 'home.php'){
        $class2 = "active";
    }
    ?>
    <li class= <?php echo $class1; ?> ><a href='about-us.php'>About Us</a></li>
    <li class= <?php echo $class2; ?> ><a href='home.php'>Home</a></li>
    <li class= <?php echo $class3; ?> ><a href='login.php'>Login</a></li>
        
</ul>