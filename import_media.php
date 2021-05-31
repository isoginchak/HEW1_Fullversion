<?php
session_start();
if (isset($_GET["target"]) && $_GET["target"] !== "") {
    $target = $_GET["target"];
} else {
    header("Location: index.php");
}
$MIMETypes = array(
'png' => 'image/png',
'jpeg' => 'image/jpeg',
'gif' => 'image/gif',
'mp4' => 'video/mp4'
);
try {
    $user = "root";
    $pass = "";
    $mysql = new PDO("mysql:host=localhost;dbname=hew", "root", "", );
    $sql = "SELECT * FROM video WHERE fname = :target;";
    $stmt = $mysql->prepare($sql);
    $stmt -> bindValue(":target", $target, PDO::PARAM_STR);
    $stmt -> execute();
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    header("Content-Type: ".$MIMETypes[$row["extension"]]);
    echo($row["raw_data"]);
    echo($row["title"]);
} catch (PDOException $e) {
    echo("<p>500 Inertnal Server Error</p>");
    exit($e->getMessage());
}
