<?php require 'mission3_7_headerSession.php'; ?>
<?php require 'mission3_7_database.php'; ?>
<?php require 'mission3_7_headerDB.php'; ?>
<?php require 'mission3_7_header.php'; ?>
<p>編集内容を入力してください。</p>
<?php require 'mission3_7_error.php'; ?>
<form action = "mission3_7_editing.php" method = "post">
  <p>コメント<br><input type = "text" name = "editComment" size = "50" value = "<?= $record['comment']; ?>"><br></p>
  <input type = "hidden" name = "editNum" value = "<?= $_REQUEST['editNum']; ?>">
  <input type = "hidden" name = "postFlg" value = TRUE>
  <input type = "submit" value = "決定">
</form>
<form action = "mission3_7_contribution.php" method = "post">
  <input type = "submit" value = "キャンセル">
</form>
<?php require 'mission3_7_footer.php'; ?>
