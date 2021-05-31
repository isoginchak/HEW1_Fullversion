<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ログイン
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
        <div class="wrapper">
          <!-- ナビゲーション -->
          <div class="zdo_drawer_menu left">
            <div class="zdo_drawer_bg">
            </div>
            <button type="button" class="zdo_drawer_button">
              <span class="zdo_drawer_bar zdo_drawer_bar1">
              </span>
              <span class="zdo_drawer_bar zdo_drawer_bar2">
              </span>
              <span class="zdo_drawer_bar zdo_drawer_bar3">
              </span>
              <span class="zdo_drawer_menu_text zdo_drawer_text">MENU
              </span>
              <span class="zdo_drawer_close zdo_drawer_text">CLOSE
              </span>
            </button>
            <nav class="zdo_drawer_nav_wrapper">
              <ul class="zdo_drawer_nav">
                <li>
                  <a href="index.php">
                    HOME
                  </a>
                </li>
                <li>
                  <a href="ranking_video.php">
                    ランキング
                  </a>
                </li>
                <li>
                  <a href="new_video.php">
                    新着
                  </a>
                </li>
                <li>
                  <a href="live.php">
                    生放送
                  </a>
                </li>
                <li>
                  <a href="access.php">
                    アクセス
                  </a>
                </li>
                <?php
                session_start();
// ログイン状態チェック
if (!isset($_SESSION['mailaddress'])) {
    echo "<li>
<a href='newaccount.php'>
新規登録
</a>
</li>
<li>
<a href='login.php'>
ログイン
</a>
</li> ";
} else {
    echo "<li>
<a href='mypage.php'>
マイページ
</a>
</li> ";
}
?>
              </ul>
            </nav>
          </div>
          <?php
if (isset($_SESSION["mailaddress"])) {
    // echo 'Logoutしました。';
    //セッション変数のクリア
    $_SESSION = array();
    //セッションクッキーも削除
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
    session_name(),
    '',
    time() - 42000,
    $params["path"],
    $params["domain"],
    $params["secure"],
    $params["httponly"]
);
    }
    //セッションクリア
    @session_destroy();
    header('Location: index.php');
} else {
    echo 'SessionがTimeoutしました。';
}
?>
          <div class="gohome">
            <a href="index.php">&#12296;HOMEに戻る&#12297;
            </a>
          </div>
        </div>
      </body>
    </html>
