<?php require 'mission3_7_headerSession.php'; ?>
<?php require 'mission3_7_database.php'; ?>
<?php require 'mission3_7_headerDB.php'; ?>
<?php require 'mission3_7_header.php'; ?>
<!--ログイン状態-->
<p><?php echo $_SESSION['name']; ?>さんでログイン中</p>
<form action = "mission3_7_logout.php" method = "get">
  <input type = "submit" value = "ログアウト">
</form><br>
<!--コメント入力フォーム-->
<p>コメントを入力してください。</p>
<?php require 'mission3_7_error.php'; ?>
<form action = "mission3_7_contribution.php" method = "post">
  <p>コメント<br><input type = "text" name = "comment" size = "50" value = ""><br></p>
  <input type = "hidden" name = "postFlg" value = TRUE>
  <input type = "submit" value = "送信">
</form><br>
<!--編集番号選択プルダウンボックス-->
<form action = "mission3_7_editing.php" method = "post">
  <p>編集番号：<select name = "editNum">
  <?php for($i = 0; $i < count($col); $i++) { echo "<option value = $col[$i] >", $i + 1, "</option>\n"; } ?>
  </select><br></p>
  <input type = "submit" value = "編集">
</form><br>
<!--削除番号選択プルダウンボックス-->
<form action = "mission3_7_deletion.php" method = "post">
  <p>削除番号：<select name = "delNum">
  <?php for($i = 0; $i < count($col); $i++) { echo "<option value = $col[$i] >", $i + 1, "</option>\n"; } ?>
  </select><br></p>
  <input type = "submit" value = "削除">
</form><br>
<?php require 'mission3_7_footerDB.php'; ?>
<?php require 'mission3_7_footer.php'; ?>
