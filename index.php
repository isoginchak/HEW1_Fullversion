<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/scroll.css">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js">
    </script>
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/orange/pace-theme-loading-bar.min.css" />
    <title>HOME
    </title>
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
      <p>ラッコの動画共有サイト</p>
      <div class="account">
        <?php
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
      <!-- <h2><a href="index2.php"><img src="images/osusume.png" alt=""></a></h2> -->
    </div>
    <div id="loopslider">
      <ul>
        <li>
          <a href="#">
            <img src="images/photo01.jpg" width="150" height="150" alt="" />
          </a>
        </li>
        <li>
          <a href="#">
            <img src="images/photo02.jpg" width="150" height="150" alt="" />
          </a>
        </li>
        <li>
          <a href="#">
            <img src="images/photo03.jpg" width="150" height="150" alt="" />
          </a>
        </li>
        <li>
          <a href="#">
            <img src="images/photo04.jpg" width="150" height="150" alt="" />
          </a>
        </li>
        <li>
          <a href="#">
            <img src="images/photo05.jpg" width="150" height="150" alt="" />
          </a>
        </li>
        <li>
          <a href="#">
            <img src="images/photo06.jpg" width="150" height="150" alt="" />
          </a>
        </li>
        <li>
          <a href="#">
            <img src="images/photo07.jpg" width="150" height="150" alt="" />
          </a>
        </li>
        <li>
          <a href="#">
            <img src="images/photo08.jpg" width="150" height="150" alt="" />
          </a>
        </li>
        <li>
          <a href="#">
            <img src="images/photo09.jpg" width="150" height="150" alt="" />
          </a>
        </li>
        <li>
          <a href="#">
            <img src="images/photo10.jpg" width="150" height="150" alt="" />
          </a>
        </li>
      </ul>
    </div>
    <!--/#loopslider-->
    <script type="text/javascript">
      $(function(){
        $('#loopslider').each(function(){
          var loopsliderWidth = $(this).width();
          var loopsliderHeight = $(this).height();
          $(this).children('ul').wrapAll('<div id="loopslider_wrap"></div>');
          var listWidth = $('#loopslider_wrap').children('ul').children('li').width();
          var listCount = $('#loopslider_wrap').children('ul').children('li').length;
          var loopWidth = (listWidth)*(listCount);
          $('#loopslider_wrap').css({
            // top: '0',
            left: '0',
            width: ((loopWidth) * 2),
            height: (loopsliderHeight),
            overflow: 'hidden',
            position: 'absolute'
          }
                                   );
          $('#loopslider_wrap ul').css({
            width: (loopWidth)
          }
                                      );
          loopsliderPosition();
          function loopsliderPosition(){
            $('#loopslider_wrap').css({
              left:'0'}
                                     );
            $('#loopslider_wrap').stop().animate({
              left:'-' + (loopWidth) + 'px'}
                                                 ,45000,'linear');
            setTimeout(function(){
              loopsliderPosition();
            }
                       ,45000);
          };
          $('#loopslider_wrap ul').clone().appendTo('#loopslider_wrap');
        }
                             );
      }
       );
    </script>
  </body>
</html>
