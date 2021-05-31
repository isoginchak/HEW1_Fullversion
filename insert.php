<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>新規登録
    </title>
  </head>
  <body>
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
        <title>ログイン
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
// パスワードのhash化
$hash_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
// DB接続
$mysql = new PDO("mysql:host=localhost;dbname=hew", "root", "");
$username=$_POST["username"];
$mailaddress=$_POST["mailaddress"];
$password=$_POST["password"];
$sql = "INSERT INTO account(username,mailaddress,password)
VALUES(:username,:mailaddress,:password)";
$stmt = $mysql->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':mailaddress', $mailaddress, PDO::PARAM_STR);
$stmt->bindValue(':password', $hash_pass, PDO::PARAM_STR);
$stmt->execute();
?>
      <div class='logins'>
        <img src='images/made.png' class='login_image' alt='ログイン成功'>
      </div>
      <div class="gohome">
        <a href="index.php">&#12296;HOMEに戻る&#12297;
        </a>
      </div>
    </div>
  </body>
