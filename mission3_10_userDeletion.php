<?php require 'mission3_10_startSession.php'; ?>
<?php require 'mission3_10_userDatabase.php'; ?>
<?php require 'mission3_10_userProcessing.php'; ?>
<?php require 'mission3_10_header.php'; ?>
<div class = "top">
<h1>NECO-BBS</h1>
<p><font color = "red">本当に<?= htmlspecialchars($_SESSION['name']); ?>さんの情報を削除してよろしいですか。</font></p>
<p>決定を押すとログアウトします。</p>
<form action = "mission3_10_userDeletion.php" method = "post">
  <input type = "hidden" name = "delNum" value = "<?= $_SESSION['userID']; ?>">
  <input type = "hidden" name = "postFlg" value = "user">
  <input type = "submit" value = "決定">
</form>
<form action = "mission3_10_contribution.php" method = "post">
  <input type = "submit" value = "キャンセル">
</form>
</div>
<?php require 'mission3_10_footer.php'; ?>
