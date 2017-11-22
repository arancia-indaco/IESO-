<?php require 'mission3_10_startSession.php'; ?>
<?php require 'mission3_10_database.php'; ?>
<?php require 'mission3_10_processing.php'; ?>
<?php require 'mission3_10_header.php'; ?>
<div class = "top">
<h1>NECO-BBS</h1>
<!--ログイン状態-->
<h5><?php echo $_SESSION['name']; ?>さんでログイン中</h5>
<div style="display:inline-flex">
<p>
<form action = "mission3_10_logout.php" method = "get">
  <input class = "submit" type = "submit" value = "ログアウト">
</form>
<form action = "mission3_10_userEditing.php" method = "get">
  <input class = "submit" type = "submit" value = "名前を変更">
</form>
<form action = "mission3_10_userDeletion.php?" method = "get">
  <input class = "submit" type = "submit" value = "登録情報削除">
</form>
</p>
</div>
</div>
<hr>
<div class = "menu">
<!--コメント入力フォーム-->
<p>投稿欄</p>
<?php require 'mission3_10_error.php'; ?>
<form action = "mission3_10_contribution.php" method = "post" enctype = "multipart/form-data">
  <p>コメント<br><input type = "text" name = "comment" size = "30" placeholder = "コメントを入力"><br></p>
  <p>アップロード<br><input name = "upFile" type = "file" size = "30"><br></p>
  <input type = "hidden" name = "postFlg" value = TRUE>
  <input type = "submit" value = "送信">
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
<table border = "0" cellpadding = "10" cellspacing = "0">
<tr><th>番号</th><th>名前</th><th>コメント</th><th>添付ファイル</th><th>書き込み日時</th><th>編集</th><th>削除</th></tr>
<?php
for($i = 0; $i < count($col); $i++)
{
  $record = $table[$i];
  echo '<tr>'. "\n";
  echo '<td align = "right">'. ($i + 1). '</td>'. "\n";
  echo '<td align = "center">'. htmlspecialchars($record['name']). '</td>'. "\n";
  echo '<td align = "center">'. htmlspecialchars($record['comment']). '</td>'. "\n";
  if(array_key_exists($record['mime'], $imageExt))
  {
    echo '<td align = "center">'. "\n";
    echo '<a href = "#" onClick = "window.open(\'mission3_10_file.php?id='. $record['id']. '\', null)">'. "\n";
    echo '<image src = "mission3_10_file.php?id='. $record['id']. '" width = "320" height = "180">'. "\n";
    echo '</a>'. "\n";
    echo '</td>'. "\n";
  }
  elseif(array_key_exists($record['mime'], $videoExt))
  {
    echo '<td align = "center">'. "\n";
    echo '<a href = "#" onClick = "window.open(\'mission3_10_file.php?id='. $record['id']. '\', null)">'. "\n";
    echo '<video controls playsinline width = "320" height = "180">'. "\n";
    echo '<source src = "mission3_10_file.php?id='. $record['id']. '" type = "'. $record['mime']. '">'. "\n";
    echo '</video>'. "\n";
    echo '</a>'. "\n";
    echo '</td>'. "\n";
  }
  else
  {
    echo '<td align = "center" width = "320" height = "180">添付なし</td>'. "\n";
  }
  echo '<td align = "center">'. htmlspecialchars($record['contributeTime']). '</td>'. "\n";
  if($_SESSION['userID'] == $record['userID'] || $_SESSION['userID'] == '000000')
  {
    echo '<td align = "center">'. "\n";
    echo '<form action = "mission3_10_editing.php" method = "post">'. "\n";
    echo '<input type = "hidden" name = "editNum" value = "'. $col[$i]. '">'. "\n";
    echo '<input type = "submit" value = "編集">'. "\n";
    echo '</form>'. "\n";
    echo '</td>'. "\n";
    echo '<td align = "center">'. "\n";
    echo '<form action = "mission3_10_deletion.php" method = "post">'. "\n";
    echo '<input type = "hidden" name = "delNum" value = "'. $col[$i]. '">'. "\n";
    echo '<input type = "submit" value = "削除">'. "\n";
    echo '</form>'. "\n";
    echo '</td>'. "\n";
  }
  echo '</tr>'. "\n";
}
?>
</table>
</div>
<style>
.submit
{
  margin: 0px 120px;
  text-align: center;
  width: 180px;
}
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
<?php require 'mission3_10_footer.php'; ?>
