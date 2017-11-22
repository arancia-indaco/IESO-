<?php require 'mission3_10_userDatabase.php'; ?>
<?php require 'mission3_10_userProcessing.php'; ?>
<?php require 'mission3_10_adminHeader.php'; ?>
<div class = "top">
<h1>NECO-BBS</h1>
</div>
<div class = "menu">
<!--編集番号選択プルダウンボックス-->
<form action = "mission3_10_adminEditing.php" method = "post">
  <p>編集番号：<select name = "editNum">
  <?php for($i = 0; $i < count($col); $i++) { echo "<option value = $col[$i] >", $i + 1, "</option>\n"; } ?>
  </select><br></p>
  <input type = "submit" value = "編集">
</form><br>
<!--削除番号選択プルダウンボックス-->
<form action = "mission3_10_adminDeletion.php" method = "post">
  <p>削除番号：<select name = "delNum">
  <?php for($i = 0; $i < count($col); $i++) { echo "<option value = $col[$i] >", $i + 1, "</option>\n"; } ?>
  </select><br></p>
  <input type = "submit" value = "削除">
</form><br>
</div>
<?php
try
{
  $table = $pdo->selectData($tbName);
  // $pdo->colList($tbName);
  // $pdo->tbList();
  // $pdo->tbField($tbName);
  // $pdo->tbDetail();
  // $pdo->tbDelete($tbName);
  $pdo = null;
}
catch(PDOException $e)
{
  echo 'エラー：'. $e->getMessage(). '<br>'. "\n";
}
?>
<div class = "list">
<table border = "0" cellpadding="10" cellspacing="0">
<tr><th>番号</th><th>名前</th><th>メールアドレス</th><th>登録日時</th><th>登録状況</th><th>編集</th><th>削除</th></tr>
<?php
for($i = 0; $i < count($col); $i++)
{
  $data = $table[$i];
  echo '<tr>'. "\n";
  echo '<td align = "right">'. ($i + 1). '</td>'. "\n";
  echo '<td align = "center">'. htmlspecialchars($data['name']). '</td>'. "\n";
  echo '<td align = "center">'. htmlspecialchars($data['mail']). '</td>'. "\n";
  echo '<td align = "center">'. htmlspecialchars($data['entryTime']). '</td>'. "\n";
  echo '<td align = "center">'. htmlspecialchars($data['status']). '</td>'. "\n";
  echo '<td align = "center">'. "\n";
  echo '<form action = "mission3_10_adminEditing.php" method = "post">'. "\n";
  echo '<input type = "hidden" name = "editNum" value = "'. $col[$i]. '">'. "\n";
  echo '<input type = "submit" value = "編集">'. "\n";
  echo '</form>'. "\n";
  echo '</td>'. "\n";
  echo '<td align = "center">'. "\n";
  echo '<form action = "mission3_10_adminDeletion.php" method = "post">'. "\n";
  echo '<input type = "hidden" name = "delNum" value = "'. $col[$i]. '">'. "\n";
  echo '<input type = "submit" value = "削除">'. "\n";
  echo '</form>'. "\n";
  echo '</td>'. "\n";
  echo '</tr>'. "\n";
}
?>
</table>
</div>
<style>
.menu
{
  margin: 0px -10px 0px 10px;
  float: left;
  width: 20%;
}
.list
{
  margin: 0px 10px 0px -10px;
  float: right;
  width: 80%;
}
</style>
<?php require 'mission3_10_adminFooter.php'; ?>
