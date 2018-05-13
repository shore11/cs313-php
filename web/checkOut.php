<?php
    session_start();
?>

<!DOCTYPE>

<html>
    <head>
        <title>Check Out</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="prove3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="form-group">
            <form method="post" action="confirm.php">
                <label for="name">Full Name:</label>
                <input class="form-control" type="text" name="name">
                <label for="city">City: </label>
                <input class="form-control" type="text" name="city">
                <label for="state">State: </label>
                <input class="form-control" type="text" name="state">
                <label for="streetAddress">Street Address: </label>
                <input class="form-control" type="text" name="streetAddress"><br>
                <ul class="list-group">
                    <li class="list-group-item">Total Amount Due:<span class="badge">$<?php echo $_SESSION['total']; ?></span> </li>
                </ul>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <form method="get" action="viewCart.php">
                <button type="submit" class="btn btn-warning">Back to View Cart</button>
            </form>
        </div>
    </body>
</html>