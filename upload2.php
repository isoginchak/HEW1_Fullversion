<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js">
    </script>
    <script src="js/zdo_drawer_menu.js">
    </script>
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic&display=swap" rel="stylesheet">
    <title>マイページ
    </title>
  </head>
  <body>
    <!-- ナビゲーション -->
    <header>
      <h1 class="headh1">
        <a href="index.php">
          <img src="images/rakko2.png" alt="ロゴ" class=headlogo>
        </a>
      </h1>
      <nav>
        <ul class="topnav">
          <li>
            <a href="ranking_video.php">
              <img src="images/ranking.png" alt="" class="rankingimg">
              <br>
              <!-- ランキング -->
            </a>
          </li>
          <li>
            <a href="new_video.php">
              <img src="images/sinntyaku.png" alt="" class="navimg">
              <br>
              <!-- 新着 -->
            </a>
          </li>
          <li>
            <a href="live.php">
              <img src="images/live.png" alt="" class="navimg">
              <br>
              <!-- 生放送 -->
            </a>
          </li>
          <li>
            <a href="access.php">
              <img src="images/accsess.png" alt="" class="navimg">
              <br>
              <!-- アクセス -->
            </a>
          </li>
          <?php
          session_start();
// ログイン状態チェック
if (!isset($_SESSION['mailaddress'])) {
?>
          <li>
            <a href='newaccount.php'>
              <img src="images/touroku.png" alt="" class="loginimg">
            </a>
          </li>
          <li>
            <a href='login.php'>
              <img src="images/login.png" alt="" class="loginimg">
            </a>
          </li>
        </ul>
        <?php
}
else {
?>
        <li>
          <a href='mypage.php'>
            <img src="images/mypage.png" alt="" class="loginimg">
          </a>
        </li>
        </ul>
      <?php
}
?>
      </ul>
    </nav>
  </header>
<div class="wrapper">
  <?php
try{
$mysql = new PDO("mysql:host=localhost;dbname=hew","root","",);
// ファイルアップロードがあったとき
if (isset($_FILES['upfile']['error']) && is_int($_FILES['upfile']['error']) && $_FILES["upfile"]["name"] !== ""){
//エラーチェック
switch ($_FILES['upfile']['error']) {
case UPLOAD_ERR_OK: // OK
break;
case UPLOAD_ERR_NO_FILE:   // 未選択
throw new RuntimeException('ファイルが選択されていません', 400);
case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
throw new RuntimeException('ファイルサイズが大きすぎます', 400);
default:
throw new RuntimeException('その他のエラーが発生しました', 500);
}
//画像・動画をバイナリデータにする．
$raw_data = file_get_contents($_FILES['upfile']['tmp_name']);
//拡張子を見る
$tmp = pathinfo($_FILES["upfile"]["name"]);
$extension = $tmp["extension"];
if($extension === "mp4" || $extension === "MP4"){
$extension = "mp4";
}
else{
echo "非対応ファイルです．<br/>";
echo ("<a href=\"index.php\">戻る</a><br/>");
exit(1);
}
$title= $_POST["title"];
// DBに格納するファイルネーム設定
// サーバー側の一時的なファイルネームと取得時刻を結合した文字列にsha256をかける．
$date = getdate();
$fname = $_FILES["upfile"]["tmp_name"]
.$date["year"].$date["mon"].$date["mday"].$date["hours"].$date["minutes"].$date["seconds"]
;
$fname = hash("sha256", $fname);
//画像・動画をDBに格納．
$sql = "INSERT INTO video(fname, extension,title,userid,raw_data) VALUES (:fname, :extension,:title,:userid,:raw_data)";
$stmt = $mysql->prepare($sql);
$stmt -> bindValue(":fname",$fname, PDO::PARAM_STR);
$stmt -> bindValue(":title",$title, PDO::PARAM_STR);
$stmt -> bindValue(":userid",$_SESSION['ID'], PDO::PARAM_STR);
$stmt -> bindValue(":extension",$extension, PDO::PARAM_STR);
$stmt -> bindValue(":raw_data",$raw_data, PDO::PARAM_STR);
$stmt -> execute();
$video = $stmt->fetch();
echo "<div class='logins'><img src='images/videook.png' class='login_image' alt='投稿完了'></div>";
}
}
catch(PDOException $e){
echo("<p>500 Inertnal Server Error</p>");
exit($e->getMessage());
}
?>
  <div class="gohome">
    <a href="index.php">&#12296;HOMEに戻る&#12297;
    </a>
  </div>
</div>
</body>
</html>
