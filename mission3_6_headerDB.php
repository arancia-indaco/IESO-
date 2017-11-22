<?php
$tbName = 'tb_mission3_6'; //テーブル名
try
{
  $pdo = new Database();
  // $pdo->tbCreate($tbName);
  //登録フォームとパスワードとパスワード（確認用）が存在しているか判断
  if(isset($_REQUEST['name']) && isset($_REQUEST['entryPW']) && isset($_REQUEST['checkPW']) && isset($_REQUEST['postFlg']))
  {
    //登録内容が入力されているか判断
    if($_REQUEST['name'] != '' && $_REQUEST['entryPW'] != '' && $_REQUEST['checkPW'] != '' && $_REQUEST['postFlg'])
    {
      //パスワードとパスワード（確認用）が一致しているか判断
      if($_REQUEST['entryPW'] == $_REQUEST['checkPW'])
      {
        //登録
        $entryID = $pdo->insertData($tbName, $_REQUEST['name'], $_REQUEST['entryPW']);
        header("Location:mission3_6.php?entryID=". $entryID); //リダイレクト
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
          header("Location:mission3_6_editing.php?editNum=". $_REQUEST['editNum']); //リダイレクト
          exit();
        }
        if(isset($_REQUEST['delNum']))
        {
          header("Location:mission3_6_deletion.php?delNum=". $_REQUEST['delNum']); //リダイレクト
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
      header("Location:mission3_6.php"); //リダイレクト
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
      header("Location:mission3_6.php"); //リダイレクト
      exit();
    }
  }
  $col = $pdo->getID($tbName);
  if(isset($_REQUEST['editNum']))
    $record = $pdo->getRecord($tbName, $_REQUEST['editNum']);
  if(isset($_REQUEST['delNum']))
    $record = $pdo->getRecord($tbName, $_REQUEST['delNum']);
  if(isset($_REQUEST['entryID']))
    $record = $pdo->getRecord($tbName, $_REQUEST['entryID']);
}
catch(PDOException $e)
{
  echo 'エラー：'. $e->getMessage(). '<br>'. "\n";
}
?>
