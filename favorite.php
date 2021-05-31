<?php
session_start();
header('Content-type: text/plain; charset= UTF-8');
$mysql = new PDO("mysql:host=localhost;dbname=hew", "root", "", );
$videoid =$_POST["videoid"];
$id=$_SESSION["ID"];
$sql  = "SELECT count(*)  FROM favoritevideo WHERE video_id = :videoid and user_id= :id";
$stmt = $mysql->prepare($sql);
$stmt->bindParam(':videoid', $videoid, PDO::PARAM_INT);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$count =$stmt->fetchColumn();
if ($count<1) {
    $sql = "INSERT INTO favoritevideo(video_id,user_id)VALUES(:videoid,:userid)";
    $stmt = $mysql->prepare($sql);
    $stmt->bindParam(':videoid', $videoid, PDO::PARAM_INT);
    $stmt->bindParam(':userid', $id, PDO::PARAM_INT);
    $stmt->execute();
    $sql="UPDATE video SET favorite = favorite +1 where videoid=:videoid";
    $stmt = $mysql->prepare($sql);
    $stmt->bindParam(':videoid', $videoid, PDO::PARAM_INT);
    $stmt->execute();
    echo "追加";
} else {
    $sql ="DELETE FROM favoritevideo where video_id=:videoid AND user_id=:userid";
    $stmt = $mysql->prepare($sql);
    $stmt->bindParam(':videoid', $videoid, PDO::PARAM_INT);
    $stmt->bindParam(':userid', $id, PDO::PARAM_INT);
    $stmt->execute();
    $sql="UPDATE video SET favorite = favorite -1 where videoid=:videoid";
    $stmt = $mysql->prepare($sql);
    $stmt->bindParam(':videoid', $videoid, PDO::PARAM_INT);
    $stmt->execute();
    echo "削除";
}
