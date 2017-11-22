<?php require 'mission3_6_database.php'; ?>
<?php require 'mission3_6_headerDB.php'; ?>
<?php require 'mission3_6_header.php'; ?>
<p>以下の名前のIDとパスワードを入力してください。</p>
<table border = "0" cellpadding="10" cellspacing="0">
  <tr><th>お名前</th><th>登録日時</th></tr>
  <tr><td><?= htmlspecialchars($record['name']); ?></td><td><?= $record['entryTime']; ?></td></tr>
</table>
<?php require 'mission3_6_error.php'; ?>
<form action = "mission3_6_password.php" method = "post">
  <p>ID<br><input type = "text" name = "loginID" size = "50" value = ""><br></p>
  <p>パスワード<br><input type = "password" name = "loginPW" size = "50" value = ""><br></p>
  <?php
  if(isset($_REQUEST['editNum']))
    echo '<input type = "hidden" name = "editNum" value = "'. $_REQUEST['editNum']. '">';
  if(isset($_REQUEST['delNum']))
    echo '<input type = "hidden" name = "delNum" value = "'. $_REQUEST['delNum']. '">';
  ?>
  <input type = "hidden" name = "passwordFlg" value = TRUE>
  <input type = "submit" value = "決定">
</form>
<form action = "mission3_6_entry.php" method = "post">
  <input type = "submit" value = "キャンセル">
</form>
<?php require 'mission3_6_footer.php'; ?>
