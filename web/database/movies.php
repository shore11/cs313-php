<?
  // DATABASE CONNECTION
  $query = "SELECT title, year FROM movies WHERE id = :id";
?>


<!DOCTYPE html>
<html>
<body>
    <h1>Movies</h1>
     <?php
     $user_rating = $_GET["rating"]
        foreach (db->query($query) as $movie){
          $title = $movie["title"];
        }
      ?>
</boy>
</html>
// preparing a statement
$stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->execute();
//$rows = $stmt->fetchAll(PDO::FETCH_ASSOC); goes in the while statement


// for first visit display what is for sale  ELSE show what is searched for
if(!isset($_COOKIE['visitied'])){
    setcookie('visited', 'yes', time()+ 3600);
    $stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
}

// examples of displaying data
$statement = $db->query('SELECT username, password FROM note_user');
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
echo 'user: ' . $row['username'] . ' password: ' . $row['password'] . '<br/>';
}
