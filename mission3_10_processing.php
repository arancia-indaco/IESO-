<?php
$tbName = 'NECO_BBS'; //テーブル名
$fileExt = array('image/jpeg'=>'jpg', 'image/png'=>'png', 'image/gif'=>'gif', 'video/mp4'=>'mp4');
$imageExt = array('image/jpeg'=>'jpg', 'image/png'=>'png', 'image/gif'=>'gif');
$videoExt = array('video/mp4'=>'mp4');
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
      if($matchFlg = $pdo->matchLogin('UserInformation', $_REQUEST['loginID'], $_REQUEST['loginPW']))
      {
        if($login = $pdo->getLogin('UserInformation', $_REQUEST['loginID']))
        {
          $_SESSION['userID'] = $login['userID'];
          $_SESSION['name'] = $login['name'];
          session_regenerate_id(TRUE);
          header("Location:mission3_10_contribution.php"); //リダイレクト
          exit();
        }
      }
    }
  }
  //アップロード処理
  if($uploadFlg = is_uploaded_file($_FILES['upFile']['tmp_name']))
  {
    //DBに挿入可能か判断
    if($_FILES['upFile']['error'] == 0 && $_FILES['upFile']['size'] < 1024 * 1024)
    {
      $extension = pathinfo($_FILES['upFile']['name'], PATHINFO_EXTENSION);
      //DB挿入データの処理
      if(in_array($extension, $fileExt, TRUE))
      {
        $mime = array_keys($fileExt, $extension, TRUE);
        $binaryFile = file_get_contents($_FILES['upFile']['tmp_name']);
      }
    }
  }
  //投稿フォームが存在しているか判断
  if(isset($_REQUEST['comment']) && isset($_REQUEST['postFlg']))
  {
    //投稿内容が入力されているか判断
    if($_REQUEST['comment'] != '' && $_REQUEST['postFlg'])
    {
      //添付ファイルの有無を判断し、投稿
      if($uploadFlg == TRUE && isset($mime[0]) && $binaryFile !== FALSE)
        $pdo->insertData($tbName, $_REQUEST['comment'], $mime[0], $binaryFile);
      elseif($_FILES['upFile']['size'] == 0)
        $pdo->insertData($tbName, $_REQUEST['comment']);
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
      header("Location:mission3_10_contribution.php"); //リダイレクト
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
      header("Location:mission3_10_contribution.php"); //リダイレクト
      exit();
    }
  }
  if(isset($_SESSION['userID']))
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
