<?php
$tbName = 'UserInformation'; //テーブル名
try
{
  $pdo = new UserDatabase();
  // $pdo->tbCreate($tbName);
  //登録フォームが存在しているか判断
  if(isset($_REQUEST['name']) && isset($_REQUEST['entryPW']) && isset($_REQUEST['checkPW']) && isset($_REQUEST['mail']) && isset($_REQUEST['postFlg']))
  {
    //登録内容が入力されているか判断
    if($_REQUEST['name'] != '' && $_REQUEST['entryPW'] != '' && $_REQUEST['checkPW'] != '' && $_REQUEST['mail'] != '' && $_REQUEST['postFlg'])
    {
      //パスワードとパスワード（確認用）が一致しているか判断
      if($_REQUEST['entryPW'] == $_REQUEST['checkPW'])
      {
        //パスワード、メールアドレスが正しい表現か判断
        if($passwordFlg = preg_match('/\A[a-z\d]{4,100}+\z/i', $_REQUEST['entryPW']) && filter_var($_REQUEST['mail'], FILTER_VALIDATE_EMAIL))
        {
          //登録
          $temporaryID = $pdo->insertData($tbName, $_REQUEST['name'], $_REQUEST['mail'], $_REQUEST['entryPW']);
          header("Location:mission3_10_userSendMail.php?temporaryID=". $temporaryID); //リダイレクト
          exit();
        }
      }
    }
  }
  //IDとパスワードが存在しているか判断
  if(isset($_REQUEST['loginID']) && isset($_REQUEST['loginPW']) && isset($_REQUEST['passwordFlg']))
  {
    //IDとパスワードが入力されているか判断
    if($_REQUEST['loginID'] != '' && $_REQUEST['loginPW'] != '' && $_REQUEST['passwordFlg'])
    {
      //入力されたIDとパスワードが一致しているか判断
      if($matchFlg = $pdo->matchPassword($tbName, $_REQUEST['loginID'], $_REQUEST['loginPW']))
      {
        header("Location:mission3_10_adminMain.php"); //リダイレクト
        exit();
      }
    }
  }
  //編集対象が存在しているか判断
  if(isset($_REQUEST['editName']) && isset($_REQUEST['editNum']) && isset($_REQUEST['postFlg']))
  {
    //編集内容が入力されているか判断
    if($_REQUEST['editName'] != '' && $_REQUEST['editNum'] != '' && ($_REQUEST['postFlg'] == 'admin' || $_REQUEST['postFlg'] == 'user'))
    {
      //編集
      $pdo->updateData($tbName, $_REQUEST['editName'], $_REQUEST['editNum']);
      if($_REQUEST['postFlg'] == 'admin')
      {
        header("Location:mission3_10_adminMain.php"); //リダイレクト
        exit();
      }
      else
      {
        header("Location:mission3_10_logout.php"); //リダイレクト
        exit();
      }
    }
  }
  //削除対象が存在しているか判断
  if(isset($_REQUEST['delNum']) && isset($_REQUEST['postFlg']))
  {
    //削除番号が選択されているか判断
    if($_REQUEST['delNum'] != '' && ($_REQUEST['postFlg'] == 'admin' || $_REQUEST['postFlg'] == 'user'))
    {
      //削除
      $pdo->deleteData($tbName, $_REQUEST['delNum']);
      if($_REQUEST['postFlg'] == 'admin')
      {
        header("Location:mission3_10_adminMain.php"); //リダイレクト
        exit();
      }
      else
      {
        header("Location:mission3_10_logout.php"); //リダイレクト
        exit();
      }
    }
  }
  $col = $pdo->getID($tbName);
  if(isset($_REQUEST['editNum']))
    $record = $pdo->getRecord($tbName, $_REQUEST['editNum']);
  if(isset($_REQUEST['delNum']))
    $record = $pdo->getRecord($tbName, $_REQUEST['delNum']);
  if(isset($_REQUEST['temporaryID']))
  {
    $record = $pdo->getRecord($tbName, $_REQUEST['temporaryID']);
    mb_language('Japanese');
    mb_internal_encoding('UTF-8');
    $to = $record['mail'];
    $subject = '[NECO-BBS]本登録用メール';
    $body = '本登録を完了するには下記のURLをクリックしてください。'. "\n". 'http://co-782.it.99sv-coco.com/mission3/mission3_10/mission3_10_userAfterEntry.php?entryID='. $record['userID']. "\n";
    $header = 'From: aranciawind@gmail.com'. "\n";
    $mailFlg = mb_send_mail($to, $subject, $body, $header);
  }
  if(isset($_REQUEST['entryID']))
  {
    $record = $pdo->getRecord($tbName, $_REQUEST['entryID']);
    $entryFlg = $pdo->entryData($tbName, $_REQUEST['entryID']);
  }
}
catch(PDOException $e)
{
  echo 'エラー：'. $e->getMessage(). '<br>'. "\n";
}
?>
