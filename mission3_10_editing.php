<?php require 'mission3_10_startSession.php'; ?>
<?php require 'mission3_10_database.php'; ?>
<?php require 'mission3_10_processing.php'; ?>
<?php require 'mission3_10_header.php'; ?>
<p>編集内容を入力してください。</p>
<?php require 'mission3_10_error.php'; ?>
<form action = "mission3_10_editing.php" method = "post" enctype = "multipart/form-data">
  <input type = "hidden" name = "name" value = "<?= $record['name']; ?>">
  <p>コメント<br><input type = "text" name = "editComment" size = "50" value = "<?= $record['comment']; ?>"><br></p>
  <input type = "hidden" name = "editNum" value = "<?= $_REQUEST['editNum']; ?>">
  <input type = "hidden" name = "postFlg" value = TRUE>
  <input type = "submit" value = "決定">
</form>
<form action = "mission3_10_contribution.php" method = "post">
  <input type = "submit" value = "キャンセル">
</form>
<?php require 'mission3_10_footer.php'; ?>
