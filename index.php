<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/scroll.css">
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/orange/pace-theme-loading-bar.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <title>HOME</title>
  </head>
  <body>
    <div class="wrap">
      <h1>
        <img src="images/rakko2.png" alt="ロゴ">
      </h1>
      <nav>
        <ul class="global_nav">
          <li  class="ranking">
            <a href="ranking_video.php">
              <img src="images/ranking.png" alt="" class="rankingimg">
              <!-- Ranking -->
            </a>
          </li>
          <li>
            <a href="new_video.php">
              <img src="images/sinntyaku.png" alt="" class="newimg">
              <br>
              <!-- New -->
            </a>
          </li>
          <li>
            <a href="live.php">
              <img src="images/live.png" alt="" class="liveimg">
              <br>
              <!-- Live -->
            </a>
          </li>
          <li>
            <a href="access.php">
              <img src="images/accsess.png" alt="" class="mapimg">
              <br>
              <!-- Access -->
            </a>
          </li>
        </ul>
      </nav>
      <div class="title">
        <p>ラッコの動画共有サイト</p>
      </div>

      <div class="account">
        <?php
        session_start();
// ログイン状態チェック
if (!isset($_SESSION['mailaddress'])) {
    ?>
        <ul>
          <li>
            <a href='newaccount.php'>
              <img src="images/sinnkiimg.png" alt="">
            </a>
          </li>
          <li>
            <a href='login.php'>
              <img src="images/loginimg.png" alt="">
            </a>
          </li>
        </ul>
        <?php
} else {
        ?>
        <ul>
          <li>
            <a href='mypage.php'>
              <img src="images/mypageimg.png" alt="">
            </a>
          </li>
        </ul>
        <?php
    }
?>
      </div>

    <div class="slide">
      <ul class="slider">
        <li>
            <img src="images/photo01.jpg"   alt="" />
        </li>
        <li>
            <img src="images/photo02.jpg"   alt="" />
        </li>
        <li>
            <img src="images/photo03.jpg"   alt="" />
        </li>
        <li>
            <img src="images/photo04.jpg"   alt="" />
        </li>
        <li>
            <img src="images/photo05.jpg"  alt="" />
        </li>
        <li>
            <img src="images/photo06.jpg"  alt="" />
        </li>
        <li>
            <img src="images/photo07.jpg"  alt="" />
        </li>
        <li>
            <img src="images/photo08.jpg" alt="" />
        </li>
        <li>
            <img src="images/photo09.jpg"   alt="" />
        </li>
        <li>
            <img src="images/photo10.jpg"   alt="" />
        </li>
      </ul>
    </div>
    </div>
    <!--/#loopslider-->
    <script>
    $(function() {
        $('.slider').slick({
          autoplay: true,//自動でスライドさせる
          autoplaySpeed: 0,//次の画像に切り替えるまでの時間 今回の場合は0
          speed: 8000,//画像が切り替わるまでの時間 今回の場合は難病で1枚分動くか
          cssEase: 'linear',//動きの種類は等速に
          arrows:false,//左右に出る矢印を非表示
          swipe: false,//スワイプ禁止
          pauseOnFocus: false,//フォーカスが合っても止めない
          pauseOnHover: false,//hoverしても止めない
          centerMode: true,//一枚目を中心に表示させる
          initialSlide: 5,//最初に表示させる要素の番号を指定
          variableWidth: true,//スライドの要素の幅をcssで設定できるようにする
        });
    });
  </script>
  </body>
</html>
