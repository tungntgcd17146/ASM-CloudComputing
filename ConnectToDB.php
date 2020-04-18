<!DOCTYPE html>
<html>
<body>

<h1>DATABASE CONNECTION</h1>

<?php
ini_set('display_errors', 1);
echo "Hello, this is ATN shop";
?>

<?php


if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=tungntgcd17146', 'postgres', '123456');
}  else {
     echo '<p>The DB exists</p>';
     echo getenv("dbname");
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
        "host=ec2-18-233-137-77.compute-1.amazonaws.com;port=5432;user=cibttxrjklxbqp;password=be605ce69ac7c5cf26b6b3a833e65b243685409a9d385e0a9872bdd17299b098;
        dbname=dfuhjimp17l4vf",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  

$sql = "SELECT * FROM managerATN";
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
        <th>ID</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // tạo vòng lặp 
         //while($r = mysql_fetch_array($result)){
             foreach ($resultSet as $row) {
      ?>
      <tr>
        <td scope="row"><?php echo $row['id'] ?></td>
        <td><?php echo $row['name'] ?></td>  
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
