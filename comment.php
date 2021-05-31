<?php
session_start();
$mysql = new PDO("mysql:host=localhost;dbname=hew", "root", "", );
$videoid =$_POST["videoid"];
$id=$_SESSION["ID"];
$comment=$_POST["comment"];
$sql="INSERT INTO comment(videoid,userid,comment)VALUES(:videoid,:userid,:comment)";
$stmt = $mysql->prepare($sql);
$stmt->bindParam(':videoid', $videoid, PDO::PARAM_INT);
$stmt->bindParam(':userid', $id, PDO::PARAM_INT);
$stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
$stmt->execute();
echo "成功";
$uri = $_SERVER['HTTP_REFERER'];
header("Location: ".$uri);
?>
