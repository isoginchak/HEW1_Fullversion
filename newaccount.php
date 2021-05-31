<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js">
    </script>
    <link rel="stylesheet" href="css/scroll.css">
    <script src="js/zdo_drawer_menu.js">
    </script>
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic&display=swap" rel="stylesheet">
    <title>新規登録
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
  <h1>新規登録
  </h1>
  <div class="sinnkipage">
    <div class="form">
      <form action="insert.php" method="post" class="login-form">
        <input type="text" placeholder="ユーザーネーム" name="username" required>
        <br>
        <input type="email" name="mailaddress" placeholder="メールアドレス" required>
        <br>
        <input type="password" class="form-control" name="password" id="password" placeholder="パスワード" required>
        <br>
        <input type="password" class="form-control" name="confirm" oninput="CheckPassword(this)"placeholder="パスワード（再確認）" required>
        <br>
        <input type="submit" value="登録" class="button">
      </form>
    </div>
  </div>
  <script>
    function CheckPassword(confirm){
      // 入力値取得
      var input1 = password.value;
      var input2 = confirm.value;
      // パスワード比較
      if(input1 != input2){
        confirm.setCustomValidity("入力値が一致しません。");
      }
      else{
        confirm.setCustomValidity('');
      }
    }
  </script>
  </body>
</html>
