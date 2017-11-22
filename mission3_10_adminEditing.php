<?php require 'mission3_10_userDatabase.php'; ?>
<?php require 'mission3_10_userProcessing.php'; ?>
<?php require 'mission3_10_adminHeader.php'; ?>
<div class = "top">
<h1>NECO-BBS</h1>
<p>編集内容を入力してください。</p>
<?php require 'mission3_10_error.php'; ?>
<form action = "mission3_10_adminEditing.php" method = "post">
  <p>お名前<br><input type = "text" name = "editName" size = "50" value = "<?= $record['name']; ?>"><br></p>
  <input type = "hidden" name = "editNum" value = "<?= $_REQUEST['editNum']; ?>">
  <input type = "hidden" name = "postFlg" value = "admin">
  <input type = "submit" value = "決定">
</form>
<form action = "mission3_10_adminMain.php" method = "post">
  <input type = "submit" value = "キャンセル">
</form>
</div>
<?php require 'mission3_10_adminFooter.php'; ?>
