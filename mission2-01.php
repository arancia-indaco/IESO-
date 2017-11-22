<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
</head>
<body background = "../sample/bgcat1.gif">
  <?php
    //名前が未入力時のエラー処理
    if(isset($_REQUEST['name']))
      if($_REQUEST['name'] == '')
        echo '<font color = "red">名前が未入力です。</font><br>', "\n";
    //コメントが未入力時のエラー処理
    if(isset($_REQUEST['comment']))
      if($_REQUEST['comment'] == '')
        echo '<font color = "red">コメントが未入力です。</font><br>', "\n";
  ?>
  <br>
  <!--名前、コメント送信フォーム-->
  <form action = "mission2-01.php" method = "post">
    お名前<br>
    <input type = "text" name = "name" size = "50"><br>
    コメント<br>
    <input type = "text" name = "comment" size = "50"><br>
    <input type = "submit" value = "送信">
  </form>
  <br>
  <?php
    //名前、コメントのフォームが存在しているか判断
    if(isset($_REQUEST['name']) && isset($_REQUEST['comment']))
    {
      //名前、コメントが入力されているか判断
      if($_REQUEST['name'] != '' && $_REQUEST['comment'] != '')
      {
        //ブラウザ上への表示
        echo 'お名前：', htmlspecialchars($_REQUEST['name']), 'さん。<br>', "\n";
        echo 'コメント：', htmlspecialchars($_REQUEST['comment']), '<br>', "\n";
      }
    }
  ?>
  <br>
  <br>
  <!--戻るボタン-->
  <form action = "../mission2">
    <button type = "submit">
      <img src = "../sample/scat7.gif" width = "50" height = "50">
    </button>
  </form>
</body>
</html>
