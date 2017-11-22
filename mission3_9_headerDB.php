<?php
$tbName = 'tb_mission3_9'; //テーブル名
try
{
  $pdo = new Database();
  // $pdo->tbCreate($tbName);
  //登録フォームが存在しているか判断
  if(isset($_REQUEST['name']) && isset($_REQUEST['entryPW']) && isset($_REQUEST['checkPW']) && isset($_REQUEST['mail']) && isset($_REQUEST['postFlg']))
  {
    //登録内容が入力されているか判断
    if($_REQUEST['name'] != '' && $_REQUEST['entryPW'] != '' && $_REQUEST['checkPW'] != '' && $_REQUEST['mail'] != '' && $_REQUEST['postFlg'])
    {
      //パスワードとパスワード（確認用）が一致しているか、メールアドレスが正しいか判断
      if($_REQUEST['entryPW'] == $_REQUEST['checkPW'] && filter_var($_REQUEST['mail'], FILTER_VALIDATE_EMAIL))
      {
        //登録
        $temporaryID = $pdo->insertData($tbName, $_REQUEST['name'], $_REQUEST['mail'], $_REQUEST['entryPW']);
        header("Location:mission3_9_sendMail.php?temporaryID=". $temporaryID); //リダイレクト
        exit();
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
        if(isset($_REQUEST['editNum']))
        {
          header("Location:mission3_9_editing.php?editNum=". $_REQUEST['editNum']); //リダイレクト
          exit();
        }
        if(isset($_REQUEST['delNum']))
        {
          header("Location:mission3_9_deletion.php?delNum=". $_REQUEST['delNum']); //リダイレクト
          exit();
        }
      }
    }
  }
  //編集用投稿フォームが存在しているか判断
  if(isset($_REQUEST['editName']) && isset($_REQUEST['editNum']) && isset($_REQUEST['postFlg']))
  {
    //編集用投稿内容が入力されているか判断
    if($_REQUEST['editName'] != '' && $_REQUEST['editNum'] != '' && $_REQUEST['postFlg'])
    {
      //編集
      $pdo->updateData($tbName, $_REQUEST['editName'], $_REQUEST['editNum']);
      header("Location:mission3_9.php"); //リダイレクト
      exit();
    }
  }
  //投稿削除セレクトボックスが存在しているか判断
  if(isset($_REQUEST['delNum']) && isset($_REQUEST['postFlg']))
  {
    //投稿削除番号が選択されているか判断
    if($_REQUEST['delNum'] != '' && $_REQUEST['postFlg'])
    {
      //削除
      $pdo->deleteData($tbName, $_REQUEST['delNum']);
      header("Location:mission3_9.php"); //リダイレクト
      exit();
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
    $subject = '[test]本登録用メール';
    $body = 'http://co-782.it.99sv-coco.com/mission3/mission3_9/mission3_9_afterEntry.php?entryID='. $record['id']. "\n";
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
