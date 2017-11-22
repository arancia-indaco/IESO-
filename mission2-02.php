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
  <form action = "mission2-02.php" method = "post">
    お名前<br>
    <input type = "text" name = "name" size = "50"><br>
    コメント<br>
    <input type = "text" name = "comment" size = "50"><br>
    <input type = "submit" value = "送信">
  </form>
  <br>
  <?php
    $fname = 'output2-02.txt';
    //名前、コメントのフォームが存在しているか判断
    if(isset($_REQUEST['name']) && isset($_REQUEST['comment']))
    {
      //名前、コメントが入力されているか判断
      if($_REQUEST['name'] != '' && $_REQUEST['comment'] != '')
      {
        date_default_timezone_set('Japan');
        $fp = fopen($fname, 'a');
        $gp = fopen($fname, 'r');
        for($count = 1; fgets($gp); $count++); //行数のカウント
        fwrite($fp, $count);
        fwrite($fp, "<>");
        fwrite($fp, $_REQUEST['name']);
        fwrite($fp, "<>");
        fwrite($fp, $_REQUEST['comment']);
        fwrite($fp, "<>");
        fwrite($fp, date(H時i分s秒));
        fwrite($fp, "\n");
        fclose($fp);
        fclose($gp);
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
