<?php require 'mission2-15_database.php'; ?>
<?php
$tbName = 'BBS'; //テーブル名
try
{
  $pdo = new Database();
  //投稿削除セレクトボックスが存在しているか判断
  if(isset($_REQUEST['delNum']) && isset($_REQUEST['delNum']))
  {
    //投稿削除番号が選択されているか判断
    if($_REQUEST['delNum'] != '' && $_REQUEST['postFlg'])
    {
      //削除
      $pdo->deleteData($tbName, $_REQUEST['delNum']);
      header("Location:mission2-15.php"); //リダイレクト
      exit();
    }
  }
  $record = $pdo->getRecord($tbName, $_REQUEST['delNum']);
}
catch(PDOException $e)
{
  echo 'エラー：'. $e->getMessage(). '<br>'. "\n";
}
?>
<?php require 'mission2-15_header.php'; ?>
<p>以下の投稿を削除します。</p>
<table border = "0" cellpadding="10" cellspacing="0">
  <tr><th>名前</th><th>コメント</th><th>日付</th></tr>
  <tr><td><?= htmlspecialchars($record['name']); ?></td><td><?= htmlspecialchars($record['comment']); ?></td><td><?= $record['record']; ?></td></tr>
</table>
<p><font color = "red">本当に削除してよろしいですか。</font></p>
<form action = "mission2-15_deletion.php" method = "post">
  <input type = "hidden" name = "delNum" value = "<?= $_REQUEST['delNum']; ?>">
  <input type = "hidden" name = "postFlg" value = "true">
  <input type = "submit" value = "決定">
</form>
<form action = "mission2-15.php" method = "post">
  <input type = "submit" value = "キャンセル">
</form>
<?php require 'mission2-15_footer.php'; ?>
