<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js">
    </script>
    <script src="js/top.js">
    </script>
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic&display=swap" rel="stylesheet">
    <title>アクセス
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
  <div class="aqua">
    <h1>アクセス
    </h1>
    <h2>マリンピア日本海
    </h2>
    <hr>
    <h3>新潟県新潟市
    </h3>
    <h2>のとじま水族館
    </h2>
    <hr>
    <h3>石川県七尾市
    </h3>
    <h2>鳥羽水族館
    </h2>
    <hr>
    <h3>三重県鳥羽市
    </h3>
    <h2>須磨海浜水族園
    </h2>
    <hr>
    <h3>兵庫県神戸市
    </h3>
    <h2>アドベンチャーワールド
    </h2>
    <hr>
    <h3>和歌山県西牟婁郡白浜町
    </h3>
    <h2>マリンワールド海の中道
    </h2>
    <hr>
    <h3>福岡県福岡市
    </h3>
  </div>
  <form class="access" action="access.php" method="post">
    <label>近くのラッコがいる水族館を調べる
    </label>
    <br>
    <select name="ken">
      <!-- disabled属性：選択を無効にする -->
      <option disabled selected>都道府県を選択してください。
      </option>
      <!-- 				        optgroupはoptionをグループ分けできる。label属性は必須でグループ名を記入する。
-->
      <optgroup label="北海道・東北">
        <option value="北海道">北海道
        </option>
        <option value="青森県">青森県
        </option>
        <option value="秋田県">秋田県
        </option>
        <option value="岩手県">岩手県
        </option>
        <option value="山形県">山形県
        </option>
        <option value="宮城県">宮城県
        </option>
        <option value="福島県">福島県
        </option>
      </optgroup>
      <optgroup label="甲信越・北陸">
        <option value="山梨県">山梨県
        </option>
        <option value="長野県">長野県
        </option>
        <option value="新潟県">新潟県
        </option>
        <option value="富山県">富山県
        </option>
        <option value="石川県">石川県
        </option>
        <option value="福井県">福井県
        </option>
      </optgroup>
      <optgroup label="関東">
        <option value="茨城県">茨城県
        </option>
        <option value="栃木県">栃木県
        </option>
        <option value="群馬県">群馬県
        </option>
        <option value="埼玉県">埼玉県
        </option>
        <option value="千葉県">千葉県
        </option>
        <option value="東京都">東京都
        </option>
        <option value="神奈川県">神奈川県
        </option>
      </optgroup>
      <optgroup label="東海">
        <option value="愛知県">愛知県
        </option>
        <option value="静岡県">静岡県
        </option>
        <option value="岐阜県">岐阜県
        </option>
        <option value="三重県">三重県
        </option>
      </optgroup>
      <optgroup label="関西">
        <option value="大阪府">大阪府
        </option>
        <option value="兵庫県">兵庫県
        </option>
        <option value="京都府">京都府
        </option>
        <option value="滋賀県">滋賀県
        </option>
        <option value="奈良県">奈良県
        </option>
        <option value="和歌山県">和歌山県
        </option>
      </optgroup>
      <optgroup label="中国">
        <option value="岡山県">岡山県
        </option>
        <option value="広島県">広島県
        </option>
        <option value="鳥取県">鳥取県
        </option>
        <option value="島根県">島根県
        </option>
        <option value="山口県">山口県
        </option>
      </optgroup>
      <optgroup label="四国">
        <option value="徳島県">徳島県
        </option>
        <option value="香川県">香川県
        </option>
        <option value="愛媛県">愛媛県
        </option>
        <option value="高知県">高知県
        </option>
      </optgroup>
      <optgroup label="九州・沖縄">
        <option value="福岡県">福岡県
        </option>
        <option value="佐賀県">佐賀県
        </option>
        <option value="長崎県">長崎県
        </option>
        <option value="熊本県">熊本県
        </option>
        <option value="大分県">大分県
        </option>
        <option value="宮崎県">宮崎県
        </option>
        <option value="鹿児島県">鹿児島県
        </option>
        <option value="沖縄県">沖縄県
        </option>
      </optgroup>
    </select>
    <input type="submit" name="送信" value="送信">
  </form>
  <?php
if (isset($_POST["ken"])) {
    if ($_POST["ken"]=='北海道'||$_POST["ken"]=='青森県'||$_POST["ken"]=='秋田県'||$_POST["ken"]=='岩手県'||$_POST["ken"]=='山形県'||$_POST["ken"]=='宮城県'
||$_POST["ken"]=='福島県'||$_POST["ken"]=='山梨県'||$_POST["ken"]=='長野県'||$_POST["ken"]=='新潟県'||$_POST["ken"]=='茨城県'||$_POST["ken"]=='栃木県'||$_POST["ken"]=='群馬県'||$_POST["ken"]=='埼玉県'||$_POST["ken"]=='千葉県'||$_POST["ken"]=='東京都'
||$_POST["ken"]=='神奈川県'
) {
        echo "<p class='kekka'>";
        echo $_POST["ken"];
        echo "の近くの水族館は";
        print "マリンピア日本海（新潟県）です";
        echo "</p>";
    } elseif ($_POST["ken"]=='富山県'||$_POST["ken"]=='石川県'||$_POST["ken"]=='福井県'||$_POST["ken"]=='岐阜県') {
        echo "<p class='kekka'>";
        echo $_POST["ken"];
        echo "の近くの水族館は";
        print "のとじま水族館（石川県）です";
        echo "</p>";
    } elseif ($_POST["ken"]=='滋賀県'||$_POST["ken"]=='三重県'
||$_POST["ken"]=='愛知県') {
        echo "<p class='kekka'>";
        echo $_POST["ken"];
        echo "の近くの水族館は";
        print "鳥羽水族館（三重県）です";
        echo "</p>";
    } elseif ($_POST["ken"]=='和歌山県'||$_POST["ken"]=='奈良県') {
        echo "<p class='kekka'>";
        echo $_POST["ken"];
        echo "の近くの水族館は";
        print "アドベンチャーワールド（和歌山県）です";
        echo "</p>";
    } elseif ($_POST["ken"]=='兵庫県'||$_POST["ken"]=='鳥取県'||$_POST["ken"]=='岡山県'||$_POST["ken"]=='香川県'||$_POST["ken"]=='徳島県'||$_POST["ken"]=='京都府'||$_POST["ken"]=='大阪府'||$_POST["ken"]=='高知県') {
        echo "<p class='kekka'>";
        echo $_POST["ken"];
        echo "の近くの水族館は";
        print "須磨海浜水族園（兵庫県）です";
        echo "</p>";
    } else {
        echo "<p class='kekka'>";
        echo $_POST["ken"];
        echo "の近くの水族館は";
        print "マリンワールド海の中道（福岡県）です";
        echo "</p>";
    }
}
?>
  <div class="gotop">
    <a href="#" id="page_top">
      <img class="up" src="images/gotop.png" alt="上へ戻る">
    </a>
  </div>
</div>
</body>
</html>
