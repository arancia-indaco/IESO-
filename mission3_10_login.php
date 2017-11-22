<?php require 'mission3_10_startSession.php'; ?>
<?php require 'mission3_10_database.php'; ?>
<?php require 'mission3_10_processing.php'; ?>
<?php require 'mission3_10_header.php'; ?>
<div class = "top">
<h1>NECO-BBS</h1>
<p>IDとパスワードを入力してください。</p>
<?php require 'mission3_10_error.php'; ?>
<form action = "mission3_10_login.php" method = "post">
  <p>ID<br><input type = "text" name = "loginID" size = "50" placeholder = "IDを入力してください。"><br></p>
  <p>パスワード<br><input type = "password" name = "loginPW" size = "50" placeholder = "パスワードを入力してください。"><br></p>
  <input type = "hidden" name = "loginFlg" value = TRUE>
  <input type = "submit" value = "決定">
</form><br>
</div>
<?php require 'mission3_10_footer.php'; ?>
