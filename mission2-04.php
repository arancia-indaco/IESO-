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
    $fname = 'output2-04.txt';
    //ファイルが存在しているか判断
    if(file_exists($fname))
      $farray = file($fname);
  ?>
  <br>
  <!--名前、コメント送信フォーム-->
  <form action = "mission2-04.php" method = "post">
    お名前<br>
    <input type = "text" name = "name" size = "50"><br>
    コメント<br>
    <input type = "text" name = "comment" size = "50"><br>
    <input type = "submit" value = "送信">
  </form>
  <br>
  <!--コメント削除セレクトボックス-->
  <?php
    //削除確認モード時の処理
    if($_REQUEST['delete'])
    {
      //削除確定時の処理
      echo '<form action = "mission2-04.php" method = "post">', "\n";
        echo '<font color = "red">本当に', $_REQUEST['delnum'], '番の投稿を削除しますか？</font><br>', "\n";
        echo '<input type = "hidden" name = "delnum" value = "', $_REQUEST['delnum'], '">', "\n";
        echo '<input type = "hidden" name = "delete" value = "0">', "\n";
        echo '<input type = "submit" value = "確定">', "\n";
      echo '</form>', "\n";
      //削除キャンセル時の処理
      echo '<form action = "mission2-04.php" method = "post">', "\n";
        echo '<input type = "hidden" name = "delete" value = "0">', "\n";
        echo '<input type = "submit" value = "キャンセル">', "\n";
      echo '</form>', "\n";
    }
    //通常削除モード時の処理
    else
    {
      //削除番号選択プルダウンボックス
      echo '<form action = "mission2-04.php" method = "post">', "\n";
        echo '削除番号：', "\n";
        echo '<select name = "delnum">', "\n";
          for($i = 0; $i < count($farray); $i++)
            echo '<option value = "', $i + 1, '">', $i + 1, '</option>', "\n";
        echo '</select><br>', "\n";
        echo '<input type = "hidden" name = "delete" value = "1">', "\n";
        echo '<input type = "submit" value = "削除">', "\n";
      echo '</form>', "\n";
    }
  ?>
  <br>
  <?php
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
        header('Location:mission2-04.php'); //リダイレクト
        exit();
      }
    }
    //削除モード実行中でないか判断
    if(!$_REQUEST['delete'])
    {
      //コメント削除のセレクトボックスが存在しているか判断
      if(isset($_REQUEST['delnum']))
      {
        //コメント削除の番号が選択されているか判断
        if($_REQUEST['delnum'] != '')
        {
          $farray = file($fname);
          unlink($fname);
          $fp = fopen($fname, 'a');
          $count = 0;
          for($i = 0; $i < count($farray); $i++)
          {
            $exfarray = explode("<>", $farray[$i]);
            //削除番号以外の投稿の上書き
            if($exfarray[0] != mb_convert_kana($_REQUEST['delnum'], 'n', 'UTF-8'))
            {
              $count++;
              fwrite($fp, $count);
              for($j = 1; $j < count($exfarray); $j++)
              {
                fwrite($fp, "<>");
                fwrite($fp, $exfarray[$j]);
              }
            }
          }
          fclose($fp);
          header('Location:mission2-04.php'); //リダイレクト
          exit();
        }
      }
    }
    //ファイルが存在しているか判断
    if(file_exists($fname))
    {
      $farray = file($fname);
      //ブラウザ上への表示
      for($i = 0; $i < count($farray); $i++)
      {
        $exfarray = explode("<>", $farray[$i]);
        for($j = 0; $j < count($exfarray); $j++)
          echo htmlspecialchars($exfarray[$j]), "\n";
        echo '<br>';
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
