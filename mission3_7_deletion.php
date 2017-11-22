<?php require 'mission3_7_headerSession.php'; ?>
<?php require 'mission3_7_database.php'; ?>
<?php require 'mission3_7_headerDB.php'; ?>
<?php require 'mission3_7_header.php'; ?>
<p>以下の投稿を削除します。</p>
<table border = "0" cellpadding="10" cellspacing="0">
  <tr><th>名前</th><th>コメント</th><th>書き込み日時</th></tr>
  <tr><td><?= $_SESSION['name']; ?></td><td><?= htmlspecialchars($record['comment']); ?></td><td><?= $record['contributeTime']; ?></td></tr>
</table>
<p><font color = "red">本当に削除してよろしいですか。</font></p>
<form action = "mission3_7_deletion.php" method = "post">
  <input type = "hidden" name = "delNum" value = "<?= $_REQUEST['delNum']; ?>">
  <input type = "hidden" name = "postFlg" value = TRUE>
  <input type = "submit" value = "決定">
</form>
<form action = "mission3_7_contribution.php" method = "post">
  <input type = "submit" value = "キャンセル">
</form>
<?php require 'mission3_7_footer.php'; ?>
