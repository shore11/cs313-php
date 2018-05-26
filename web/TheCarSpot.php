<!-- Connect to databse -->
<?php
    $dbUrl = getenv('DATABASE_URL');
    $dbopts = parse_url($dbUrl);

    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>The Car Spot</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="carspot.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
        margin-bottom: 0;
        padding: 1em;
        background: url('pics/jumobtronpic.jpg') no-repeat center center;
        background-size: cover;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center" >
    <h1>The Car Spot</h1>      
      <p>Buy and Sell your car on the most know, most used</p>
      <p>most popular website in the Universe!</p>
  </div>
</div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img src="rims.png" class="image-responsive" style="height: inherit" > </a> <!-- Website Logo -->
    </div>
        <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
                                                        <!-- BUTTON TO POST A NEW CAR -->
          <button class="btn btn-danger" style="margin-top: 10px"><li><a href="#">Post Car for Sale</a></li></button>
      </ul>
      <ul class="nav navbar-nav navbar-right">          <!-- SEARCH BAR -->
          <form action="" method="get" class="searchform">
              <li class="search"><label>Make</label><input list="makes" name="make">
                                                    <datalist id="makes">
                                                        <option value="Nissan">Nissan</option>
                                                        <option value="Toyota">Toyota</option>
                                                        <option value="BMW">BMW</option>
                                                        <option value="Audi">Audi</option>
                                                        <option value="Dodge">Dodge</option>
                                                    </datalist></li>
              <li class="search"><label>Model</label><input name="model"></li>
              <li class="search"><label>Year</label><input name="year" ></li>
              <li class="search"><button type="submit"><span class="glyphicon glyphicon-search"></span></button></li></form>
      </ul>                                         <!-- END OF SEARCH BAR -->
    </div>
  </div>
</nav>
<!-- PHP WILL GENERATE THE CONTAINERS -->
<?php
    $search ="Nissan";
    $query = "SELECT vh.make, vh.model, vh.year, vh.price FROM vehicle vh WHERE vh.make = :search";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":search", $search, PDO::PARAM_STR);
    $stmt->execute();
    $countContainer = 0;
    foreach($stmt->fetchALL(PDO::FETCH_ASSOC) as $car){
        $make = $car["make"];
        $model = $car["model"];
        $year = $car["year"];
        $price = $car["price"];
        if ($countContainer % 3 == 0){
            echo "<div class='container'>";
            echo "<div class='row'>";
        }
        echo "<div class='col-sm-4'>";
        echo "<div class='panel panel-primary'>";
        echo "<div class='panel-heading'>$make $model $year<span style='float: right' >'$'$price</span></div>";
        echo "<div class='panel-body'><img src='dart.jpg' class='img-responsive' style='width:100%' alt='Image'></div>";    
        echo "<div class='panel-footer'><a href='#'>More info -></a></div>";
        echo "</div>";
        echo "</div>";
            echo "<h4>$make $model $year</h4>";
        
        if ($countContainer % 3 == 2){
            echo "</div>";
            echo "</div><br>";
        }
        $countContainer++;
    }
?>
<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
          <div class="panel-heading">Dodge Dart 1996  <span style="float: right" >$21,000</span></div>
        <div class="panel-body"><img src="dart.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><a href="#">More info -></a></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-warning">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="pics/jumobtronpic.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-success">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
  </div>
</div><br><br>

<footer class="container-fluid text-center">
  <p>Online Store Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>

</body>
</html>