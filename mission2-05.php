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
    $fname = 'output2-05.txt';
    //ファイルが存在しているか判断
    if(file_exists($fname))
      $farray = file($fname);
    //編集モード時の処理
    if($_REQUEST['editing'])
    {
      //編集用の名前が未入力時のエラー処理
      if(isset($_REQUEST['editname']))
        if($_REQUEST['editname'] == '')
          echo '<font color = "red">編集用の名前が未入力です。</font><br>', "\n";
      //編集用のコメントが未入力時のエラー処理
      if(isset($_REQUEST['editcomment']))
        if($_REQUEST['editcomment'] == '')
          echo '<font color = "red">編集用のコメントが未入力です。</font><br>', "\n";
      //コメント編集セレクトボックスが存在しているか判断
      if(isset($_REQUEST['editnum']))
      {
        //コメント編集番号が選択されているか判断
        if($_REQUEST['editnum'] != '')
        {
          for($i = 0; $i < count($farray); $i++)
          {
            $exfarray = explode("<>", $farray[$i]);
            //編集番号の名前、コメントの読み取り
            if($exfarray[0] == mb_convert_kana($_REQUEST['editnum'], 'n', 'UTF-8'))
            {
              $currentname = $exfarray[1];
              $currentcomment = $exfarray[2];
            }
          }
        }
      }
    }
  ?>
  <br>
  <!--名前、コメント-->
  <?php
    //編集モード時の処理
    if($_REQUEST['editing'])
    {
      //編集用の名前、コメントのフォームが存在しているか判断
      if(isset($_REQUEST['editname']) && isset($_REQUEST['editcomment']))
      {
        //編集用の名前、コメントが入力されているか判断
        if($_REQUEST['editname'] != '' && $_REQUEST['editcomment'] != '')
        {
          echo '<p>', $_REQUEST['editnum'], "\n", $_REQUEST['editname'], "\n", $_REQUEST['editcomment'], '</p>', "\n";
          echo 'この内容で編集します。<br>', "\n";
          echo 'よろしいでしょうか？<br>', "\n";
          //編集確定時の処理
          echo '<form action = "mission2-05.php" method = "post">', "\n";
            echo '<input type = "hidden" name = "editname" value = "', $_REQUEST['editname'], '">', "\n";
            echo '<input type = "hidden" name = "editcomment" value = "', $_REQUEST['editcomment'], '">', "\n";
            echo '<input type = "hidden" name = "editnum" value = "', $_REQUEST['editnum'], '">', "\n";
            echo '<input type = "hidden" name = "editing" value = "0">', "\n";
            echo '<input type = "submit" value = "確定">', "\n";
          echo '</form>', "\n";
          //キャンセル処理
          echo '<form action = "mission2-05.php" method = "post">', "\n";
            echo '<input type = "hidden" name = "editing" value = "1">', "\n";
            echo '<input type = "hidden" name = "editnum" value = "', $_REQUEST['editnum'], '">', "\n";
            echo '<input type = "submit" value = "キャンセル">', "\n";
          echo '</form>', "\n";
        }
        //編集モードエラー時のループ処理
        else
        {
          //名前、コメント編集フォーム
          echo '<form action = "mission2-05.php" method = "post">', "\n";
            echo 'お名前<br>', "\n";
            echo '<input type = "text" name = "editname" size = "50" value = "', $currentname, '"><br>', "\n";
            echo 'コメント<br>', "\n";
            echo '<input type = "text" name = "editcomment" size = "50" value = "', $currentcomment, '"><br>', "\n";
            echo '<input type = "hidden" name = "editnum" value = "', $_REQUEST['editnum'], '">', "\n";
            echo '<input type = "hidden" name = "editing" value = "1">', "\n";
            echo '<input type = "submit" value = "編集">', "\n";
          echo '</form>', "\n";
          //キャンセル処理
          echo '<form action = "mission2-05.php" method = "post">', "\n";
            echo '<input type = "hidden" name = "editing" value = "0">', "\n";
            echo '<input type = "submit" value = "キャンセル">', "\n";
          echo '</form>', "\n";
        }
      }
      //編集モード初回実行時の処理
      else
      {
        //名前、コメント編集フォーム
        echo '<form action = "mission2-05.php" method = "post">', "\n";
          echo 'お名前<br>', "\n";
          echo '<input type = "text" name = "editname" size = "50" value = "', $currentname, '"><br>', "\n";
          echo 'コメント<br>', "\n";
          echo '<input type = "text" name = "editcomment" size = "50" value = "', $currentcomment, '"><br>', "\n";
          echo '<input type = "hidden" name = "editnum" value = "', $_REQUEST['editnum'], '">', "\n";
          echo '<input type = "hidden" name = "editing" value = "1">', "\n";
          echo '<input type = "submit" value = "編集">', "\n";
        echo '</form>', "\n";
        //キャンセル処理
        echo '<form action = "mission2-05.php" method = "post">', "\n";
          echo '<input type = "hidden" name = "editing" value = "0">', "\n";
          echo '<input type = "submit" value = "キャンセル">', "\n";
        echo '</form>', "\n";
      }
    }
    //通常投稿モード時の処理
    else
    {
      //名前、コメント投稿フォーム
      echo '<form action = "mission2-05.php" method = "post">', "\n";
        echo 'お名前<br>', "\n";
        echo '<input type = "text" name = "name" size = "50" value = ""><br>', "\n";
        echo 'コメント<br>', "\n";
        echo '<input type = "text" name = "comment" size = "50" value = ""><br>', "\n";
        echo '<input type = "submit" value = "送信">', "\n";
      echo '</form>', "\n";
    }
  ?>
  <br>
  <!--投稿削除-->
  <?php
    //削除確認モード時の処理
    if($_REQUEST['delete'])
    {
      //削除確定時の処理
      echo '<form action = "mission2-05.php" method = "post">', "\n";
        echo '<font color = "red">本当に', $_REQUEST['delnum'], '番の投稿を削除しますか？</font><br>', "\n";
        echo '<input type = "hidden" name = "delnum" value = "', $_REQUEST['delnum'], '">', "\n";
        echo '<input type = "hidden" name = "delete" value = "0">', "\n";
        echo '<input type = "submit" value = "確定">', "\n";
      echo '</form>', "\n";
      //キャンセル処理
      echo '<form action = "mission2-05.php" method = "post">', "\n";
        echo '<input type = "hidden" name = "delete" value = "0">', "\n";
        echo '<input type = "submit" value = "キャンセル">', "\n";
      echo '</form>', "\n";
    }
    //通常削除モード時の処理
    else
    {
      //削除番号選択プルダウンボックス
      echo '<form action = "mission2-05.php" method = "post">', "\n";
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
  <!--投稿編集-->
  <?php
    if(!$_REQUEST['editing'])
    {
      //編集番号選択プルダウンボックス
      echo '<form action = "mission2-05.php" method = "post">', "\n";
        echo '編集番号：', "\n";
        echo '<select name = "editnum">', "\n";
          for($i = 0; $i < count($farray); $i++)
            echo '<option value = "', $i + 1, '">', $i + 1, '</option>', "\n";
        echo '</select><br>', "\n";
        echo '<input type = "hidden" name = "editing" value = "1">', "\n";
        echo '<input type = "submit" value = "編集">', "\n";
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
        header('Location:mission2-05.php'); //リダイレクト
        exit();
      }
    }
    //削除モード実行中でないか判断
    if(!$_REQUEST['delete'])
    {
      //コメント削除セレクトボックスが存在しているか判断
      if(isset($_REQUEST['delnum']))
      {
        //コメント削除番号が選択されているか判断
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
          header('Location:mission2-05.php'); //リダイレクト
          exit();
        }
      }
    }
    //編集モード実行中でないか判断
    if(!$_REQUEST['editing'])
    {
      //編集用の名前、コメントのフォームが存在しているか判断
      if(isset($_REQUEST['editname']) && isset($_REQUEST['editcomment']))
      {
        //編集用の名前、コメントが入力されているか判断
        if($_REQUEST['editname'] != '' && $_REQUEST['editcomment'] != '')
        {
          $farray = file($fname);
          unlink($fname);
          $fp = fopen($fname, 'a');
          $count = 0;
          for($i = 0; $i < count($farray); $i++)
          {
            $exfarray = explode("<>", $farray[$i]);
            $count++;
            fwrite($fp, $count);
            //編集番号の時、投稿データの上書き
            if($exfarray[0] == mb_convert_kana($_REQUEST['editnum'], 'n', 'UTF-8'))
            {
              date_default_timezone_set('Japan');
              fwrite($fp, "<>");
              fwrite($fp, $_REQUEST['editname']);
              fwrite($fp, "<>");
              fwrite($fp, $_REQUEST['editcomment']);
              fwrite($fp, "<>");
              fwrite($fp, date(H時i分s秒));
              fwrite($fp, "\n");
            }
            //編集番号以外の投稿の上書き
            else
            {
              for($j = 1; $j < count($exfarray); $j++)
              {
                fwrite($fp, "<>");
                fwrite($fp, $exfarray[$j]);
              }
            }
          }
          fclose($fp);
          header('Location:mission2-05.php'); //リダイレクト
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
