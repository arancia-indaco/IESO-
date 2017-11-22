<?php require 'mission3_8_headerSession.php'; ?>
<?php require 'mission3_8_database.php'; ?>
<?php require 'mission3_8_headerDB.php'; ?>
<?php require 'mission3_8_header.php'; ?>
<!--ログイン状態-->
<p><?php echo $_SESSION['name']; ?>さんでログイン中</p>
<form action = "mission3_8_logout.php" method = "get">
  <input type = "submit" value = "ログアウト">
</form><br>
<!--コメント入力フォーム-->
<p>投稿欄</p>
<?php require 'mission3_8_error.php'; ?>
<form action = "mission3_8_contribution.php" method = "post" enctype="multipart/form-data">
  <p>コメント<br><input type = "text" name = "comment" size = "50" value = ""><br></p>
  <p>アップロード<br><input name = "upFile" type = "file" size = "50"><br></p>
  <input type = "hidden" name = "postFlg" value = TRUE>
  <input type = "submit" value = "送信">
</form><br>
<!--編集番号選択プルダウンボックス-->
<form action = "mission3_8_editing.php" method = "post">
  <p>編集番号：<select name = "editNum">
  <?php for($i = 0; $i < count($col); $i++) { echo "<option value = $col[$i] >", $i + 1, "</option>\n"; } ?>
  </select><br></p>
  <input type = "submit" value = "編集">
</form><br>
<!--削除番号選択プルダウンボックス-->
<form action = "mission3_8_deletion.php" method = "post">
  <p>削除番号：<select name = "delNum">
  <?php for($i = 0; $i < count($col); $i++) { echo "<option value = $col[$i] >", $i + 1, "</option>\n"; } ?>
  </select><br></p>
  <input type = "submit" value = "削除">
</form><br>
<?php require 'mission3_8_footerDB.php'; ?>
<?php require 'mission3_8_footer.php'; ?>
