<?php require 'mission3_10_startSession.php'; ?>
<?php require 'mission3_10_userDatabase.php'; ?>
<?php require 'mission3_10_userProcessing.php'; ?>
<?php require 'mission3_10_header.php'; ?>
<div class = "top">
<h1>NECO-BBS</h1>
<p>編集内容を入力してください。</p>
<p>決定を押すとログアウトします。</p>
<?php require 'mission3_10_error.php'; ?>
<form action = "mission3_10_userEditing.php" method = "post">
  <p>お名前<br><input type = "text" name = "editName" size = "50" value = "<?= $_SESSION['name']; ?>"><br></p>
  <input type = "hidden" name = "editNum" value = "<?= $_SESSION['userID']; ?>">
  <input type = "hidden" name = "postFlg" value = "user">
  <input type = "submit" value = "決定">
</form>
<form action = "mission3_10_contribution.php" method = "post">
  <input type = "submit" value = "キャンセル">
</form>
</div>
<?php require 'mission3_10_footer.php'; ?>
