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
    $lastID = 0;
    
    // add the vendor of the car to db
    if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["phone"]) && isset($_POST["email"])){
        $sql = 'INSERT INTO vendor(first_name,last_name,phone_number,email) VALUES(:fname,:lname,:phone,:email)';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":fname", $_POST["fname"], PDO::PARAM_STR);
        $stmt->bindValue(":lname", $_POST["lname"], PDO::PARAM_STR);
        $stmt->bindValue(":phone", $_POST["phone"], PDO::PARAM_STR);
        $stmt->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
        $stmt->execute();
        $lastID = $db->lastInsertId();
    }

    // add the vehicle to db
    if (isset($_POST["make"]) && isset($_POST["model"]) && isset($_POST["year"]) && isset($_POST["price"]) && isset($_POST["desc"])){
        $sql = 'INSERT INTO vehicle(make,model,year,price,info,vendor_id) VALUES(:make,:model,:year,:price,:info,:id)';
        $stmt = db->prepare($sql);
        $stmt->bindValue(":make", $_POST["make"], PDO::PARAM_STR);
        $stmt->bindValue(":model", $_POST["model"], PDO::PARAM_STR);
        $stmt->bindValue(":year", $_POST["year"], PDO::PARAM_INT);
        $stmt->bindValue(":price", $_POST["price"], PDO::PARAM_INT);
        $stmt->bindValue(":info", $_POST["info"], PDO::PARAM_STR);
        $stmt->bindValue(":id", $lastID, PDO::PARAM_INT);
        $stmt->execute();
        $lastID = $db->lastInsertId();
    }

     // add location of the vehicle to db
    if (isset($_POST["city"]) && isset($_POST["state"])){
        $sql = 'INSERT INTO location(state,city,vehicle_id) VALUES(:state,:city,:id)';
        $stmt = db->prepare($sql);
        $stmt->bindValue(":state", $_POST["state"], PDO::PARAM_STR);
        $stmt->bindValue(":city", $_POST["city"], PDO::PARAM_STR);
        $stmt->bindValue(":id", $lastID, PDO::PARAM_INT);
        $stmt->execute();
        $lastID = $db->lastInsertId();
    }
    
    // go back to the main page
    echo '<script>window.location.href="TheCarSpot.php";</script>';
?>