<?php require 'mission3_10_userDatabase.php'; ?>
<?php require 'mission3_10_userProcessing.php'; ?>
<?php require 'mission3_10_adminHeader.php'; ?>
<div class = "top">
<h1>NECO-BBS</h1>
<p><font color = "red">本当に<?= htmlspecialchars($record['name']); ?>さんの情報を削除してよろしいですか。</font></p>
<form action = "mission3_10_adminDeletion.php" method = "post">
  <input type = "hidden" name = "delNum" value = "<?= $_REQUEST['delNum']; ?>">
  <input type = "hidden" name = "postFlg" value = "admin">
  <input type = "submit" value = "決定">
</form>
<form action = "mission3_10_adminMain.php" method = "post">
  <input type = "submit" value = "キャンセル">
</form>
</div>
<?php require 'mission3_10_adminFooter.php'; ?>
