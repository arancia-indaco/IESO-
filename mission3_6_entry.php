<?php require 'mission3_6_database.php'; ?>
<?php require 'mission3_6_headerDB.php'; ?>
<?php require 'mission3_6_header.php'; ?>
<?php
if(isset($_REQUEST['entryID']))
{
  echo '<font size = "5">ご登録ありがとうございます。</font><br>'. "\n";
  echo '<font color = "red" size = "5">'. htmlspecialchars($record['name']). 'さんのIDは'. $record['id']. 'です。</font><br>'. "\n";
  echo '<font size = "5">IDは記録しておいてください。</font><br>'. "\n";
}
?>
<!--名前、パスワード入力フォーム-->
<p>各項目を入力してください。</p>
<?php require 'mission3_6_error.php'; ?>
<form action = "mission3_6_entry.php" method = "post">
  <p>お名前<br><input type = "text" name = "name" size = "50" value = ""><br></p>
  <p>パスワード<br><input type = "password" name = "entryPW" size = "50" value = ""><br></p>
  <p>パスワード（確認用）<br><input type = "password" name = "checkPW" size = "50" value = ""><br></p>
  <input type = "hidden" name = "postFlg" value = TRUE>
  <input type = "submit" value = "送信">
</form><br>
<!--編集番号選択プルダウンボックス-->
<form action = "mission3_6_password.php" method = "post">
  <p>編集番号：<select name = "editNum">
  <?php for($i = 0; $i < count($col); $i++) { echo "<option value = $col[$i] >", $i + 1, "</option>\n"; } ?>
  </select><br></p>
  <input type = "submit" value = "編集">
</form><br>
<!--削除番号選択プルダウンボックス-->
<form action = "mission3_6_password.php" method = "post">
  <p>削除番号：<select name = "delNum">
  <?php for($i = 0; $i < count($col); $i++) { echo "<option value = $col[$i] >", $i + 1, "</option>\n"; } ?>
  </select><br></p>
  <input type = "submit" value = "削除">
</form><br>
<?php require 'mission3_6_footerDB.php'; ?>
<?php require 'mission3_6_footer.php'; ?>
