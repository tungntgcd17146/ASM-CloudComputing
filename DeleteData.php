<!DOCTYPE html>
<html>
<body>

<h1>INSERT DATA TO DATABASE</h1>

<?php

echo "Insert database!";
?>
<ul>
    <form name="DeleteData" action="DeleteData.php" method="POST" >
<li>toyID:</li><li><input type="text" name="toyid" /></li>
<li><button type="submit" value="Submit">Delete</button></li>
<?php


if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=tungntgcd17146', 'postgres', '123456');
}  else {
     
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

$sql = "DELETE FROM toy WHERE toyid = '$_POST[toyid]'";
$stmt = $pdo->prepare($sql);

if(is_null ($_POST[toyid])== FALSE)  {    
    if($stmt->execute() == TRUE){
        echo "Record updated successfully.";
    } else {
        echo "Error updating record. ";
    }}
?>
</body>
</html>
