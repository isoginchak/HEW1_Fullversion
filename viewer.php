<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic&display=swap" rel="stylesheet">
    <script src="js/top.js">
    </script>
    <title>VIEWER
    </title>
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
  <div class="viewer">
    <?php
$mysql = new PDO("mysql:host=localhost;dbname=hew","root","",);
if (isset($_SESSION['mailaddress'])) {
$userid=$_SESSION["ID"];
}
//DBから取得して表示する．
$sql = "SELECT * FROM video LEFT OUTER JOIN account ON account.id = video.userid WHERE videoid = :id";
$stmt = $mysql->prepare($sql);
$stmt->bindParam(':id', $_GET['id']);
$stmt -> execute();
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
$target = $row["fname"];
$title =$row["title"];
$username=$row["username"];
$id=$row["videoid"];
}
$getid=$_GET['id'];
echo ("<video src=\"import_media.php?target=$target\" width=\"650\" height=\"400\" controls></video><br>");
if (isset($_SESSION['mailaddress'])) {
?>
    <div class="title">
      <?php }
else{
?>
      <div class="title1">
        <?php } ?>
        <div class="sbox">
          <?php
print "<h2>".$title."</h2>";
print "<h3>".$username."</h3>";
//?>
        </div>
        <?php
// いいね機能
if (isset($_SESSION['mailaddress'])) {
?>
        <form   method="post" class="ssbox"  accept-charset="utf-8" return false>
          <input type="hidden" name="videoid" value="<?php echo $getid;?>" id="id">
          <?php
$sql="SELECT * FROM favoritevideo where video_id=:videoid and user_id=:userid";
$stmt = $mysql->prepare($sql);
$stmt->bindParam(':videoid',$getid,PDO::PARAM_INT);
$stmt->bindParam(':userid',$userid, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll();
if (!$result) {
echo "  <input type='image' src='images/heart.png' alt='お気に入り' width='40px' class='iine' id='iine'>";
}
else {
echo "  <input type='image' src='images/hearton.png' alt='お気に入り' width='40px'　class='iine' id='iine'>";
}
?>
        </form>
      </div>
    </div>
    <?php
}
?>
    <div class="kannren">
      <?php
// 関連動画
$sql = "SELECT * FROM video LEFT OUTER JOIN account ON account.id = video.userid where account.username=:username order by video.videoid DESC limit 3";
$stmt = $mysql->prepare($sql);
$stmt->bindParam(":username", $username);
$stmt -> execute();
// 動画再生
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
$target = $row["fname"];
$title =$row["title"];
$id=$row["videoid"];
if($row["extension"] == "mp4"){
echo ("<a href='viewer.php?id={$id}'><video src=\"import_media.php?target=$target\" width=\"250\" height=\"135\"></video></a><br>");
print "<h4>".$title."</h4>";
}
}
?>
    </div>
    <!-- コメント -->
    <?php
if (isset($_SESSION['mailaddress'])) {
?>
    <div class="commentform">
      <form class="comment" action="comment.php" method="post">
        <input type="text" name="comment" placeholder="公開コメントを入力" required="required">
        <input type="hidden" name="videoid" value="<?php echo $getid;?>" id="id">
        <input type="submit"  value="コメント">
      </form>
      <?php
$sql = "SELECT * FROM comment LEFT OUTER JOIN account on comment.userid=account.id where comment.videoid=:videoid order by comment.id DESC";
$stmt = $mysql->prepare($sql);
$stmt->bindParam(':videoid',$getid,PDO::PARAM_INT);
$stmt -> execute();
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
$username=$row["username"];
$comment=$row["comment"];
echo "<h5>";
echo $username;
echo "</h5>";
echo "<p class='commentp'>";
echo htmlspecialchars($comment, ENT_QUOTES, 'UTF-8', false);
echo "</p><hr>";
echo "<br>";
}
}
?>
    </div>
    <!-- ログインしてなかったら -->
    <div class="notlogin">
      <?php
if (!isset($_SESSION['mailaddress']))  {
$sql = "SELECT * FROM comment LEFT OUTER JOIN account on comment.userid=account.id where comment.videoid=:videoid order by comment.id DESC";
$stmt = $mysql->prepare($sql);
$stmt->bindParam(':videoid',$getid,PDO::PARAM_INT);
$stmt -> execute();
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
$username=$row["username"];
$comment=$row["comment"];
echo "<h5>";
echo $username;
echo "</h5>";
echo "<p class='commentp'>";
echo htmlspecialchars($comment, ENT_QUOTES, 'UTF-8', false);
echo "</p><hr>";
echo "<br>";
}
}
?>
    </div>
    <div class="gotop">
      <a href="#" id="page_top">
        <img class="up" src="images/gotop.png" alt="上へ戻る">
      </a>
    </div>
  </div>
  <script >
    $(function(){
      // Ajax button click
      $('#iine').on('click',function(){
        var img = document.getElementById('iine');
        var src = iine.getAttribute('src');
        if (src === 'images/heart.png') {
          document.getElementById('iine').src='images/hearton.png'
        }
        else{
          document.getElementById('iine').src='images/heart.png'
        }
        $.ajax({
          url:'favorite.php',
          type:'POST',
          data:{
            'videoid':$('#id').val()
          }
        }
              )
        // Ajaxリクエストが成功
          .done( (data) => {
          $('.result').html(data);
          console.log(data);
          console.log("成功！");
        }
               )
        // Ajaxリクエストが失敗
          .fail( (data) => {
          $('.result').html(data);
          console.log(data);
          console.log("失敗！");
        }
               )
        // Ajaxリクエストが成功・失敗どちらでも発動
          .always( (data) => {
        }
                 );
        return false;
      }
                   );
    }
     );
  </script>
  </body>
</html>
