<?php require 'mission3_7_headerSession.php'; ?>
<?php require 'mission3_7_database.php'; ?>
<?php require 'mission3_7_headerDB.php'; ?>
<?php require 'mission3_7_header.php'; ?>
<p>IDとパスワードを入力してください。</p>
<?php require 'mission3_7_error.php'; ?>
<form action = "mission3_7_login.php" method = "post">
  <p>ID<br><input type = "text" name = "loginID" size = "50" value = ""><br></p>
  <p>パスワード<br><input type = "password" name = "loginPW" size = "50" value = ""><br></p>
  <input type = "hidden" name = "loginFlg" value = TRUE>
  <input type = "submit" value = "決定">
</form>
<?php require 'mission3_7_footer.php'; ?>
