<?php require 'mission3_10_userDatabase.php'; ?>
<?php require 'mission3_10_userProcessing.php'; ?>
<?php require 'mission3_10_userHeader.php'; ?>
<?php require 'mission3_10_error.php'; ?>
<div class = "top">
<h1>NECO-BBS</h1>
<?php
if($entryFlg == TRUE)
{
  echo '<font size = "3">ご登録ありがとうございます。</font><br>'. "\n";
  echo '<font color = "red" size = "3">'. htmlspecialchars($record['name']). 'さんのIDは'. $record['userID']. 'です。</font><br>'. "\n";
  echo '<font size = "3">IDは記録しておいてください。</font><br>'. "\n";
}
?>
<p><a href="mission3_10.php">トップへ戻る</a></p>
</div>
<?php require 'mission3_10_userFooter.php'; ?>
