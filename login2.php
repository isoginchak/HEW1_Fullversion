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
$mysql = new PDO("mysql:host=localhost;dbname=hew", "root", "");
try {
    // bindParamを利用したSQL文の実行
    $sql = 'SELECT password,id FROM account WHERE mailaddress = :mailaddress;';
    $sth = $mysql->prepare($sql);
    $sth->bindParam(':mailaddress', $_POST['mailaddress']);
    $sth->execute();
    $pass = $sth->fetch();
    //認証処理
    if (password_verify($_POST['password'], $pass['password'])) {
        $_SESSION['mailaddress'] = $_POST['mailaddress'];
        $_SESSION['ID'] = $pass['id'];
        echo "<div class='logins'><img src='images/true.png' class='login_image' alt='ログイン成功'></div>";
    } else {
        echo "<div class='logins'><img src='images/faulse.png' class='login_image'alt='ログイン失敗'></div>";
    }
    // データベースへの接続に失敗した場合
} catch (PDOException $e) {
    print('接続失敗:' . $e->getMessage());
    die();
}
?>
      <div class="gohome">
        <a href="index.php">&#12296;HOMEに戻る&#12297;
        </a>
      </div>
    </div>
  </body>
</html>
