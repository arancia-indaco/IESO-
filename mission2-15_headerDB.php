<?php
$tbName = 'BBS'; //テーブル名
try
{
  $pdo = new Database();
  $pdo->tbCreate($tbName);
  //投稿フォームが存在しているか判断
  if(isset($_REQUEST['name']) && isset($_REQUEST['comment']) && isset($_REQUEST['postFlg']))
  {
    //投稿内容が入力されているか判断
    if($_REQUEST['name'] != '' && $_REQUEST['comment'] != '' && $_REQUEST['postFlg'])
    {
      //パスワードとパスワード（確認用）が存在しているか判断
      if(isset($_REQUEST['password']) && isset($_REQUEST['check_password']))
      {
        //パスワードとパスワード（確認用）が一致しているか判断
        if($_REQUEST['password'] == $_REQUEST['check_password'])
        {
          //投稿
          $pdo->insertData($tbName, $_REQUEST['name'], $_REQUEST['comment'], mb_convert_kana($_REQUEST['password'], 'n', 'UTF-8'));
        }
      }
    }
  }
  $count = $pdo->countRecord($tbName);
  $row = $pdo->getID($tbName);
}
catch(PDOException $e)
{
  echo 'エラー：'. $e->getMessage(). '<br>'. "\n";
}
?>
