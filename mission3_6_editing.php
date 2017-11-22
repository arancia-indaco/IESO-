<?php require 'mission3_6_database.php'; ?>
<?php require 'mission3_6_headerDB.php'; ?>
<?php require 'mission3_6_header.php'; ?>
<p>編集内容を入力してください。</p>
<?php require 'mission3_6_error.php'; ?>
<form action = "mission3_6_editing.php" method = "post">
  <p>お名前<br><input type = "text" name = "editName" size = "50" value = "<?= $record['name']; ?>"><br></p>
  <input type = "hidden" name = "editNum" value = "<?= $_REQUEST['editNum']; ?>">
  <input type = "hidden" name = "postFlg" value = TRUE>
  <input type = "submit" value = "決定">
</form>
<form action = "mission3_6_entry.php" method = "post">
  <input type = "submit" value = "キャンセル">
</form>
<?php require 'mission3_6_footer.php'; ?>
