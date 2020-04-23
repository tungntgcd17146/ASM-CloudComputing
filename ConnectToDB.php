<!DOCTYPE html>
<html>
<title>HOME PAGE</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="image/w3.css">
<style>
* {box-sizing: border-box}
img {vertical-align: middle;}
/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}
.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}
.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
  width: 25%; /* Four links of equal widths */
  text-align: center;
}
.navbar a:hover {
  background-color: #000;
}
.navbar a.active {
  background-color: #4CAF50;
}
@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>
<head>
</head><body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
    <a href="index.php" class="w3-bar-item w3-button">ATN Company</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="ConnectToDB.php" class="w3-bar-item w3-button">View Product Information</a>
      <a href="InsertData.php" class="w3-bar-item w3-button">Insert</a>
      <a href="UpdateData.php" class="w3-bar-item w3-button">Update</a>
      <a href="DeleteData.php" class="w3-bar-item w3-button">Delete</a>
    </div>
  </div>
</div>
</head>
<body>
  <h1>TOY INFORMATION MANAGEMENT</h1>
</body>
<h1>TOY INFORMATION MANAGEMENT</h1>
<?php
ini_set('display_errors', 1);
echo "Welcome to ATN toy company";
?>

<?php


if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DataBase does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     echo '<p>The DataBase exists</p>';
     echo getenv("dbname");
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
        "host=ec2-54-225-72-238.compute-1.amazonaws.com;port=5432;user=zyspzjwbrlxfnk;password=95402f2fcd09500f7ad877a328cb24cb0ac00800666b42159462534ac9619b11
;dbname=d7f8iof0djq8lo",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  

$sql = "SELECT * FROM toy";
$stmt = $pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();


?>
<div id="container">
<table class="table table-bordered table-condensed">
    <thead>
      <tr>
        <th>Toy ID</th>
        <th>Toy Name</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // tạo vòng lặp 
         //while($r = mysql_fetch_array($result)){
             foreach ($resultSet as $row) {
      ?>
      <tr>
        <td scope="row"><?php echo $row['toyid'] ?></td>
        <td><?php echo $row['toyname'] ?></td>  
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>

</html>
