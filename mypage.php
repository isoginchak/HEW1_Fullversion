<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js">
    </script>
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic&display=swap" rel="stylesheet">
    <script src="js/top.js">
    </script>
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
<div class="wrapper my">
  <?php
$mysql = new PDO("mysql:host=localhost;dbname=hew","root","");
$sql = "SELECT * FROM account WHERE mailaddress = :mailaddress";
$stmt = $mysql->prepare($sql);
$stmt->bindParam(':mailaddress', $_SESSION['mailaddress']);
$stmt -> execute();
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
$username=$row["username"];
$userid=$row["id"];
}
print  "<h1>".$username."さんのマイページ</h1>";
$sql = "SELECT count(*)   FROM video LEFT OUTER JOIN account ON account.id = video.userid where account.id= :id";
$stmt = $mysql->prepare($sql);
$stmt->bindParam(":id", $userid);
$stmt -> execute();
$myvideo =$stmt->fetchColumn();
// echo "$myvideo";
$sql = "SELECT count(*) FROM video LEFT OUTER JOIN favoritevideo on video.videoid=favoritevideo.video_id where favoritevideo.user_id=:id";
$stmt = $mysql->prepare($sql);
$stmt->bindParam(':id', $userid);
$stmt -> execute();
$favvideo =$stmt->fetchColumn();
// echo "$favvideo";
?>
  <details>
    <summary>動画を投稿する
    </summary>
    <form action="upload2.php" enctype="multipart/form-data" method="post" class="upload">
      <label >動画アップロード
        <br>
      </label>
      <input type="file" name="upfile" required>
      <br>
      <input type="text" name="title" placeholder="タイトル" required>
      <br>
      <p>動画はmp4方式のみ対応しています
      </p>
      <input type="submit" value="アップロード">
    </form>
  </details>

  <details>
    <summary>ユーザ名の変更</summary>
    <form action="namechange.php" method="post" class="change">
      <label>新しいユーザー名</label><br>
      <input type="text" name="newname" placeholder="新しいユーザ名" required><br>
      <input type="submit" value="変更">
    </form>

  </details>
  <h2>投稿した動画
  </h2>
  <div class="myvideo">
    <?php
if ($myvideo >=1) {
$mysql = new PDO("mysql:host=localhost;dbname=hew","root","");
$sql = "SELECT * FROM video LEFT OUTER JOIN account ON account.id = video.userid where account.id= :id order by video.videoid DESC limit 3";
$stmt = $mysql->prepare($sql);
$stmt->bindParam(":id", $userid);
$stmt -> execute();
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
$target = $row["fname"];
$title =$row["title"];
$id=$row["videoid"];
if($row["extension"] == "mp4"){
echo ("<a href='viewer.php?id={$id}'><video src=\"import_media.php?target=$target\" width=\"300\" height=\"170\"></video><br>");
print "<h4>".$title."</h4></a>";
}
}
}
else {
echo "投稿がありません";
}
?>
    <br>
  </div>
  <?php
if ($myvideo >=4) {
?>
  <p class="more">
    <a href="myvideo.php">learn more...
    </a>
  </p>
  <?php
}
?>
  <h2>お気に入りの動画
  </h2>
  <div class="myfavvideo">
    <?php
if ($favvideo >=1) {
$sql = "SELECT * FROM video LEFT OUTER JOIN favoritevideo on video.videoid=favoritevideo.video_id where favoritevideo.user_id=:id limit 3";
$stmt = $mysql->prepare($sql);
$stmt->bindParam(':id', $userid);
$stmt -> execute();
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
$target = $row["fname"];
$title =$row["title"];
$id=$row["videoid"];
if($row["extension"] == "mp4"){
echo ("<a href='viewer.php?id={$id}'><video src=\"import_media.php?target=$target\" width=\"300\" height=\"170\"></video><br>");
print "<h4>".$title."</h4></a>";
}
}
}
else {
echo "お気に入りがありません";
}
?>
    <br>
  </div>
  <?php
if ($favvideo >=4) {
?>
  <p class="more">
    <a href="myfavvideo.php">learn more...
    </a>
  </p>
  <?php } ?>
  <h3 class="logout_wrapp">
    <a href="logout.php" class="logout">ログアウト
    </a>
  </h3>
  <div class="gotop">
    <a href="#" id="page_top">
      <img class="up" src="images/gotop.png" alt="上へ戻る">
    </a>
  </div>
</div>
</body>
</html>
