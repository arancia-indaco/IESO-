<?php require 'mission3_9_database.php'; ?>
<?php require 'mission3_9_headerDB.php'; ?>
<?php require 'mission3_9_header.php'; ?>
<?php require 'mission3_9_error.php'; ?>
<?php
if($entryFlg == TRUE)
{
  echo '<font size = "3">ご登録ありがとうございます。</font><br>'. "\n";
  echo '<font color = "red" size = "3">'. htmlspecialchars($record['name']). 'さんのIDは'. $record['id']. 'です。</font><br>'. "\n";
  echo '<font size = "3">IDは記録しておいてください。</font><br>'. "\n";
}
?>
<p><a href="mission3_9_entry.php">会員登録フォームへ戻る</a></p>
<?php require 'mission3_9_footer.php'; ?>
