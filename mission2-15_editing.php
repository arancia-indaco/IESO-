<?php require 'mission2-15_database.php'; ?>
<?php
$tbName = 'BBS'; //テーブル名
try
{
  $pdo = new Database();
  //編集用投稿フォームが存在しているか判断
  if(isset($_REQUEST['editName']) && isset($_REQUEST['editComment']) && isset($_REQUEST['editNum']) && isset($_REQUEST['postFlg']))
  {
    //編集用投稿内容が入力されているか判断
    if($_REQUEST['editName'] != '' && $_REQUEST['editComment'] != '' && $_REQUEST['editNum'] != '' && $_REQUEST['postFlg'])
    {
      //編集
      $pdo->editData($tbName, $_REQUEST['editName'], $_REQUEST['editComment'], $_REQUEST['editNum']);
      header("Location:mission2-15.php"); //リダイレクト
      exit();
    }
  }
  $record = $pdo->getRecord($tbName, $_REQUEST['editNum']);
}
catch(PDOException $e)
{
  echo 'エラー：'. $e->getMessage(). '<br>'. "\n";
}
?>
<?php require 'mission2-15_header.php'; ?>
<?php require 'mission2-15_error.php'; ?>
<p>編集内容を入力してください。</p>
<form action = "mission2-15_editing.php" method = "post">
  <p>お名前<br><input type = "text" name = "editName" size = "50" value = "<?= $record['name']; ?>"><br></p>
  <p>コメント<br><input type = "text" name = "editComment" size = "50" value = "<?= $record['comment']; ?>"><br></p>
  <input type = "hidden" name = "editNum" value = "<?= $_REQUEST['editNum']; ?>">
  <input type = "hidden" name = "postFlg" value = "true">
  <input type = "submit" value = "決定">
</form>
<form action = "mission2-15.php" method = "post">
  <input type = "submit" value = "キャンセル">
</form>
<?php require 'mission2-15_footer.php'; ?>
