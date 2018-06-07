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
          <button class="btn btn-danger" style="margin-top: 10px"><li><a href="postCar.html">Post Car for Sale</a></li></button>
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
              <li class="search"><label>Year</label><input type="number" name="year" ></li>
              <li class="search"><button type="submit"><span class="glyphicon glyphicon-search"></span></button></li></form>
      </ul>                                         <!-- END OF SEARCH BAR -->
    </div>
  </div>
</nav>
<!-- PHP WILL GENERATE THE CONTAINERS -->
<?php
    $stmt;
    // the different ways to do a search for a car
    if(isset($_GET["make"]) && ($_GET["year"] == "")){
        $search =$_GET["make"];
        $query = "SELECT vh.vehicle_id, vh.make, vh.model, vh.year, vh.price FROM vehicle vh WHERE vh.make = :search";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":search", $search, PDO::PARAM_STR);
        $stmt->execute();
    } elseif (isset($_GET["year"]) && ($_GET["make"] == "")){
        $search =$_GET["year"];
        $query = "SELECT vh.vehicle_id, vh.make, vh.model, vh.year, vh.price FROM vehicle vh WHERE vh.year = :search";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":search", $search, PDO::PARAM_INT);
        $stmt->execute();
    } elseif (isset($_GET["year"]) && isset($_GET["make"])){
        $gyear =$_GET["year"];
        $gmake = $_GET["make"];
        $query = "SELECT vh.vehicle_id, vh.make, vh.model, vh.year, vh.price FROM vehicle vh WHERE vh.year = :gyear AND vh.make = :gmake";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":gyear", $gyear, PDO::PARAM_INT);
        $stmt->bindValue(":gmake", $gmake, PDO::PARAM_STR);
        $stmt->execute();      
    } elseif (($_GET["year"] == "") && ($_GET["make"]) = "") {
        $query = "SELECT vh.vehicle_id, vh.make, vh.model, vh.year, vh.price FROM vehicle vh";
        $stmt = $db->prepare($query);
        $stmt->execute();
    }
    //In case we reach our last row to display proper div tags
    $getRows = pg_query($db, $query);
    $rowCount = pg_num_rows($getRows);
    $countContainer = 0;
    foreach($stmt->fetchALL(PDO::FETCH_ASSOC) as $car){
        $id = $car["vehicle_id"];
        $make = $car["make"];
        $model = $car["model"];
        $year = $car["year"];
        $price = $car["price"];
        
        
        if($countContaier != ($rowCount - 1)){
            if ($countContainer % 3 == 0){
                echo "<div class='container'>";
                echo "<div class='row'>";
            }
            echo "<div class='col-sm-4'>";
            echo "<div class='panel panel-primary'>";
            echo "<div class='panel-heading'>$make $model $year<span style='float: right' >$ $price</span></div>";
            echo "<div class='panel-body'><img src='dart.jpg' class='img-responsive' style='width:100%' alt='Image'></div>";    
            echo "<div class='panel-footer'><a href='moreInfo.php?id=$id'>More info -></a></div>";
           // <?-- heref   moreInfo.php/id=12234 -->
            echo "</div>";
            echo "</div>";
        
            if ($countContainer % 3 == 2){
                echo "</div>";
                echo "</div><br>";
        }
        } else {
            echo "</div>";
            echo "</div><br>"; 
        }
        $countContainer++;
    }
?>
    </div></div><br>
<footer class="container-fluid text-center">
  <p style="color: black" >Online Store Copyright</p>  
 <h2 style="color: black" >Thanks for visiting our site!</h2>
</footer>

</body>
</html>