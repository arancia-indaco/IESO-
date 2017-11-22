<?php require 'mission3_8_headerSession.php'; ?>
<?php require 'mission3_8_database.php'; ?>
<?php require 'mission3_8_headerDB.php'; ?>
<?php require 'mission3_8_header.php'; ?>
<p>以下の投稿を削除します。</p>
<table border = "0" cellpadding="10" cellspacing="0">
  <tr><th>名前</th><th>コメント</th><th>添付ファイル</th><th>書き込み日時</th></tr>
  <tr>
    <td align="center"><?= htmlspecialchars($record['name']); ?></td>
    <td align="center"><?= htmlspecialchars($record['comment']); ?></td>
    <?php
    if($record['mime'] != null)
    {
      echo '<td align="center">'. "\n";
      echo '<form action = "mission3_8_file.php" method="post" target="_blank">'. "\n";
      echo '<input type = "hidden" name = "id" value = "'. $record['id']. '">'. "\n";
      echo '<input type = "hidden" name = "fileFlg" value = TRUE>'. "\n";
      echo '<input type = "submit" value = "添付ファイルを表示">'. "\n";
      echo '</form>'. "\n";
      echo '</td>'. "\n";
    }
    else
    {
      echo '<td align="center">添付なし</td>'. "\n";
    }
    ?>
    <td align="center"><?= $record['contributeTime']; ?></td>
  </tr>
</table>
<p><font color = "red">本当に削除してよろしいですか。</font></p>
<form action = "mission3_8_deletion.php" method = "post">
  <input type = "hidden" name = "delNum" value = "<?= $_REQUEST['delNum']; ?>">
  <input type = "hidden" name = "postFlg" value = TRUE>
  <input type = "submit" value = "決定">
</form>
<form action = "mission3_8_contribution.php" method = "post">
  <input type = "submit" value = "キャンセル">
</form>
<?php require 'mission3_8_footer.php'; ?>
