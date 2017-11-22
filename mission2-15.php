<?php require 'mission2-15_database.php'; ?>
<?php require 'mission2-15_headerDB.php'; ?>
<?php require 'mission2-15_header.php'; ?>
<?php require 'mission2-15_error.php'; ?>
<p>各項目を入力してください。</p>
<!--名前、コメント投稿フォーム-->
<form action = "mission2-15.php" method = "post">
  <p>お名前<br><input type = "text" name = "name" size = "50" value = ""><br></p>
  <p>コメント<br><input type = "text" name = "comment" size = "50" value = ""><br></p>
  <p>パスワード<br><input type = "password" name = "password" size = "50" value = ""><br></p>
  <p>パスワード（確認用）<br><input type = "password" name = "check_password" size = "50" value = ""><br></p>
  <input type = "hidden" name = "postFlg" value = "true">
  <input type = "submit" value = "送信">
</form><br>
<!--編集番号選択プルダウンボックス-->
<form action = "mission2-15_password.php" method = "post">
  <p>編集番号：<select name = "editNum">
  <?php for($i = 0; $i < $count; $i++) { echo '<option value = "', $row[$i], '">', $i + 1, '</option>'. "\n"; } ?>
  </select><br></p>
  <input type = "submit" value = "編集">
</form><br>
<!--削除番号選択プルダウンボックス-->
<form action = "mission2-15_password.php" method = "post">
  <p>削除番号：<select name = "delNum">
  <?php for($i = 0; $i < $count ; $i++) { echo '<option value = "', $row[$i], '">', $i + 1, '</option>'. "\n"; } ?>
  </select><br></p>
  <input type = "submit" value = "削除">
</form><br>
<?php require 'mission2-15_footerDB.php'; ?>
<?php require 'mission2-15_footer.php'; ?>
