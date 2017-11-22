<?php require 'mission3_6_database.php'; ?>
<?php require 'mission3_6_headerDB.php'; ?>
<?php require 'mission3_6_header.php'; ?>
<p><font color = "red">本当に<?= htmlspecialchars($record['name']); ?>さんの情報を削除してよろしいですか。</font></p>
<form action = "mission3_6_deletion.php" method = "post">
  <input type = "hidden" name = "delNum" value = "<?= $_REQUEST['delNum']; ?>">
  <input type = "hidden" name = "postFlg" value = TRUE>
  <input type = "submit" value = "決定">
</form>
<form action = "mission3_6_entry.php" method = "post">
  <input type = "submit" value = "キャンセル">
</form>
<?php require 'mission3_6_footer.php'; ?>
