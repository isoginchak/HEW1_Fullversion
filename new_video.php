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
    <script src="js/top.js">
    </script>
    <!-- Adobe font読み込み -->
    <title>新着
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
  <h1 class="h1">新着
  </h1>
  <div class="itirann">
    <?php
$mysql = new PDO("mysql:host=localhost;dbname=hew","root","",);
//DBから取得して表示する．
$sql = "SELECT * FROM video LEFT OUTER JOIN account ON account.id = video.userid ORDER BY video.videoid DESC;";
$stmt = $mysql->prepare($sql);
$stmt -> execute();
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
$target = $row["fname"];
$title =$row["title"];
$username=$row["username"];
$id=$row["videoid"];
if($row["extension"] == "mp4"){
echo ("<a href='viewer.php?id={$id}'><video src=\"import_media.php?target=$target\" width=\"300\" height=\"170\"></video><br>");
print "<h2>".$title."</h2>";
print "<h3>".$username."</h3>";
echo  "</a>";
}
echo ("<br/><br/>");
}
?>
  </div>
  <div class="gotop">
    <a href="#" id="page_top">
      <img class="up" src="images/gotop.png" alt="上へ戻る">
    </a>
  </div>
</div>
</body>
</html>
