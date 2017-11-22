<?php require 'mission3_10_userDatabase.php'; ?>
<?php require 'mission3_10_userProcessing.php'; ?>
<?php require 'mission3_10_adminHeader.php'; ?>
<div class = "top">
<h1>NECO-BBS</h1>
<p>管理者IDとパスワードを入力</p>
<?php require 'mission3_10_error.php'; ?>
<form action = "mission3_10_adminPass.php" method = "post">
  <p>ID<br><input type = "text" name = "loginID" size = "50" placeholder = "管理者ID"><br></p>
  <p>パスワード<br><input type = "password" name = "loginPW" size = "50" placeholder = "管理者パスワード"><br></p>
  <input type = "hidden" name = "passwordFlg" value = TRUE>
  <input type = "submit" value = "決定">
</form><br>
</div>
<?php require 'mission3_10_adminFooter.php'; ?>
