<!DOCTYPE html>
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
<html>
    <head>
        <title>More Info</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="moreInfo.css">
    </head>
    <body style="background-color: lightgray">
<div class="container">
  <div class="row" >
    <div class="col-sm-2"></div>
    <div class="col-sm-8 vendor">
            <div class="row">
                <?php
                    $search =$_GET["id"];
                    $query = "SELECT v.first_name, v.last_name, v.phone_number, v.email FROM vendor v WHERE v.vendor_id = :search";
                    $stmt = $db->prepare($query);
                    $stmt->bindValue(":search", $search, PDO::PARAM_INT);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    $fname = $result["first_name"];
                    $lname = $result["last_name"]; 
                    $phone = $result["phone_number"];
                    $email = $result["email"];
                    echo "<div class='col-sm-4'><label>Vendor's Name: </label><br>$fname $lname</div>";
                    echo "<div class='col-sm-4'><label>Contanct: </label><br><label>Phone: </label>$phone<br><label>Email: </label>$email </div>";
                    
                    $query2 = "SELECT vh.info FROM vehicle vh WHERE vh.vendor_id = :id";
                    $stmt = $db->prepare($query2);
                    $stmt->bindValue(":id", $search, PDO::PARAM_INT);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $info = $result["info"];
                    echo "<div class='col-sm-4'><label>Car Description: </label><br><p>$info</p></div>";
                ?>
            </div>
      </div>
    <div class="col-sm-2"></div>
  </div>
</div>
</body>
</html>