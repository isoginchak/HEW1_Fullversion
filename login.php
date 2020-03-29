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
  <h1>ログイン
  </h1>
  <div class="login-page">
    <div class="form">
      <form action="login2.php" method="post" class="login-form">
        <input type="text" placeholder="メールアドレス" name="mailaddress" required>
        <input type="password" placeholder="パスワード" name="password" required>
        <input type="submit"name="login"value="ログイン" class="button">
      </form>
    </div>
  </div>
</div>
</body>
</html>
