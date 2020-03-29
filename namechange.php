<?php
$mysql = new PDO("mysql:host=localhost;dbname=hew", "root", "", );
$id=$_SESSION["ID"];
$newname=$_POST["newname"];
  $sql="UPDATE account SET username = :newname where id=:id";
  $stmt = $mysql->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->bindParam(':newname', $newname, PDO::PARAM_STR);
  $stmt->execute();
  echo "変更";
  $uri = $_SERVER['HTTP_REFERER'];
  header("Location: ".$uri);

 ?>
