<?php
$tbName = 'tb_mission3_7'; //テーブル名
try
{
  $pdo = new Database();
  // $pdo->tbCreate($tbName);
  //IDとパスワードが存在しているか判断
  if(isset($_REQUEST['loginID']) && isset($_REQUEST['loginPW']) && isset($_REQUEST['loginFlg']))
  {
    //IDとパスワードが入力されているか判断
    if($_REQUEST['loginID'] != '' && $_REQUEST['loginPW'] != '' && $_REQUEST['loginFlg'])
    {
      //入力されたIDとパスワードが一致しているか判断
      if($matchFlg = $pdo->matchLogin('tb_mission3_6', $_REQUEST['loginID'], $_REQUEST['loginPW']))
      {
        if($record = $pdo->getRecord('tb_mission3_6', $_REQUEST['loginID']))
        {
          $_SESSION['id'] = $record['id'];
          $_SESSION['name'] = $record['name'];
          session_regenerate_id(true);
          header("Location:mission3_7_contribution.php"); //リダイレクト
          exit();
        }
      }
    }
  }
  //投稿フォームが存在しているか判断
  if(isset($_SESSION['name']) && isset($_REQUEST['comment']) && isset($_REQUEST['postFlg']))
  {
    //投稿内容が入力されているか判断
    if($_SESSION['name'] != '' && $_REQUEST['comment'] != '' && $_REQUEST['postFlg'])
    {
      //投稿
      $pdo->insertData($tbName, $_SESSION['name'], $_REQUEST['comment']);
    }
  }
  //編集用投稿フォームが存在しているか判断
  if(isset($_REQUEST['editComment']) && isset($_REQUEST['editNum']) && isset($_REQUEST['postFlg']))
  {
    //編集用投稿内容が入力されているか判断
    if($_REQUEST['editComment'] != '' && $_REQUEST['editNum'] != '' && $_REQUEST['postFlg'])
    {
      //編集
      $pdo->updateData($tbName, $_REQUEST['editComment'], $_REQUEST['editNum']);
      header("Location:mission3_7_contribution.php"); //リダイレクト
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
      header("Location:mission3_7_contribution.php"); //リダイレクト
      exit();
    }
  }
  if(isset($_SESSION['id']))
    $col = $pdo->getID($tbName);
  if(isset($_REQUEST['editNum']))
    $record = $pdo->getRecord($tbName, $_REQUEST['editNum']);
  if(isset($_REQUEST['delNum']))
    $record = $pdo->getRecord($tbName, $_REQUEST['delNum']);
}
catch(PDOException $e)
{
  echo 'エラー：'. $e->getMessage(). '<br>'. "\n";
}
?>
