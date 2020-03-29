<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script src="js/zdo_drawer_menu.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic&display=swap" rel="stylesheet">

  <!-- Adobe font読み込み -->
  <link rel="stylesheet" href="https://use.typekit.net/zup1sqr.css">
  <title>HOME</title>
  </head>

  <body>
    <div class="wrapper">


      <!-- ナビゲーション -->
      <div class="zdo_drawer_menu left">
    		<div class="zdo_drawer_bg"></div>
    		<button type="button" class="zdo_drawer_button">
    			<span class="zdo_drawer_bar zdo_drawer_bar1"></span>
    			<span class="zdo_drawer_bar zdo_drawer_bar2"></span>
    			<span class="zdo_drawer_bar zdo_drawer_bar3"></span>
    			<span class="zdo_drawer_menu_text zdo_drawer_text">MENU</span>
    			<span class="zdo_drawer_close zdo_drawer_text">CLOSE</span>
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
            }
            else {
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

    <article class="top2">

      <div class="top2_img">
        <a href="viewer.php?id=5"><img src="images/kibunn1_off.png" alt="眠い" class="kibunn1"></a>
        <a href="viewer.php?id=5"><img src="images/kibunn2_off.png" alt="腹ペコ" class="kibunn2"></a>
        <img src="images/hatenaotter.gif" alt="首振りラッコ" class="top2_otter">
        <img src="images/speech2.png" alt="今の気分を選んでね" class="speech2">
        <a href="viewer.php?id=12"><img src="images/kibunn3_off.png" alt="元気" class="kibunn3"></a>
        <a href="viewer.php?id=5"><img src="images/kibunn4_off.png" alt="遊びたい" class="kibunn4"></a>
      </div>

    </article>
  </div>

    </div>
    <script>
    $(function(){
       $('a img').hover(function(){
          $(this).attr('src', $(this).attr('src').replace('_off', '_on'));
            }, function(){
               if (!$(this).hasClass('currentPage')) {
               $(this).attr('src', $(this).attr('src').replace('_on', '_off'));
          }
     });
  });
    </script>


  </body>
</html>
