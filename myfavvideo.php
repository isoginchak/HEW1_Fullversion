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
} else {
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
$mysql = new PDO("mysql:host=localhost;dbname=hew", "root", "");
$sql = "SELECT * FROM account WHERE mailaddress = :mailaddress";
$stmt = $mysql->prepare($sql);
$stmt->bindParam(':mailaddress', $_SESSION['mailaddress']);
$stmt -> execute();
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    $username=$row["username"];
    $userid=$row["id"];
}
print  "<h1 class='h1'>".$username."さんのお気に入り動画</h1>";
?>
  <div class="myvideos">
    <?php
$mysql = new PDO("mysql:host=localhost;dbname=hew", "root", "");
$sql = "SELECT * FROM video LEFT OUTER JOIN favoritevideo on video.videoid=favoritevideo.video_id where favoritevideo.user_id=:id";
$stmt = $mysql->prepare($sql);
$stmt->bindParam(":id", $userid);
$stmt -> execute();
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    $target = $row["fname"];
    $title =$row["title"];
    $id=$row["videoid"];
    if ($row["extension"] == "mp4") {
        echo("<a href='viewer.php?id={$id}'><video src=\"import_media.php?target=$target\" width=\"300\" height=\"170\"></video><br>");
        print "<h4>".$title."</h4></a>";
    }
}
?>
    <br>
  </div>
  <div class="gohome">
    <a href="mypage.php">&#12296;マイページに戻る&#12297;
    </a>
  </div>
  <div class="gotop">
    <a href="#" id="page_top">
      <img class="up" src="images/gotop.png" alt="上へ戻る">
    </a>
  </div>
</div>
</body>
</html>
