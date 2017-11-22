<?php require 'mission3_10_userDatabase.php'; ?>
<?php require 'mission3_10_userProcessing.php'; ?>
<?php require 'mission3_10_userHeader.php'; ?>
<div class = "top">
<h1>NECO-BBS</h1>
<!--名前、パスワード入力フォーム-->
<p>各項目を入力してください。</p>
<?php require 'mission3_10_error.php'; ?>
<form action = "mission3_10_userEntry.php" method = "post">
  <p>お名前<br><input type = "text" name = "name" size = "50" placeholder = "山田 太郎"><br></p>
  <p>メールアドレス<br><input type = "email" name = "mail" size = "50" placeholder = "NECO-BBS@example.com"><br></p>
  <p>パスワード<br><input type = "password" name = "entryPW" size = "50" placeholder = "４文字以上の半角英数字"><br></p>
  <p>パスワード（確認用）<br><input type = "password" name = "checkPW" size = "50" placeholder = "４文字以上の半角英数字"><br></p>
  <input type = "hidden" name = "postFlg" value = TRUE>
  <input type = "submit" value = "送信">
</form><br>
</div>
<?php require 'mission3_10_userFooter.php'; ?>
