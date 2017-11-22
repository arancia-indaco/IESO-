<?php require 'mission3_10_startSession.php'; ?>
<?php require 'mission3_10_database.php'; ?>
<?php require 'mission3_10_processing.php'; ?>
<?php require 'mission3_10_header.php'; ?>
<p>以下の投稿を削除します。</p>
<table border = "0" cellpadding = "10" cellspacing = "0">
  <tr><th>名前</th><th>コメント</th><th>添付ファイル</th><th>書き込み日時</th></tr>
  <tr>
    <td align = "center"><?= htmlspecialchars($record['name']); ?></td>
    <td align = "center"><?= htmlspecialchars($record['comment']); ?></td>
    <?php
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
      echo '<td align = "center">添付なし</td>'. "\n";
    }
    ?>
    <td align = "center"><?= $record['contributeTime']; ?></td>
  </tr>
</table>
<p><font color = "red">本当に削除してよろしいですか。</font></p>
<form action = "mission3_10_deletion.php" method = "post">
  <input type = "hidden" name = "delNum" value = "<?= $_REQUEST['delNum']; ?>">
  <input type = "hidden" name = "postFlg" value = TRUE>
  <input type = "submit" value = "決定">
</form>
<form action = "mission3_10_contribution.php" method = "post">
  <input type = "submit" value = "キャンセル">
</form>
<?php require 'mission3_10_footer.php'; ?>
