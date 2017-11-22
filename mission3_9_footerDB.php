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
<table border = "0" cellpadding="10" cellspacing="0">
<tr><th>番号</th><th>名前</th><th>メールアドレス</th><th>登録日時</th><th>登録状況</th><th>編集</th><th>削除</th></tr>
<?php
for($i = 0; $i < count($col); $i++)
{
  $data = $table[$i];
  echo '<tr>'. "\n";
  echo '<td align="right">'. ($i + 1). '</td>'. "\n";
  echo '<td align="center">'. htmlspecialchars($data['name']). '</td>'. "\n";
  echo '<td align="center">'. htmlspecialchars($data['mail']). '</td>'. "\n";
  echo '<td align="center">'. htmlspecialchars($data['entryTime']). '</td>'. "\n";
  echo '<td align="center">'. htmlspecialchars($data['status']). '</td>'. "\n";
  echo '<td align="center">'. "\n";
  echo '<form action = "mission3_9_password.php" method = "post">'. "\n";
  echo '<input type = "hidden" name = "editNum" value = "'. $col[$i]. '">'. "\n";
  echo '<input type = "submit" value = "編集">'. "\n";
  echo '</form>'. "\n";
  echo '</td>'. "\n";
  echo '<td align="center">'. "\n";
  echo '<form action = "mission3_9_password.php" method = "post">'. "\n";
  echo '<input type = "hidden" name = "delNum" value = "'. $col[$i]. '">'. "\n";
  echo '<input type = "submit" value = "削除">'. "\n";
  echo '</form>'. "\n";
  echo '</td>'. "\n";
  echo '</tr>'. "\n";
}
?>
</table>
