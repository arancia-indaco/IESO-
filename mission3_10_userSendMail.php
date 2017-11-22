<?php require 'mission3_10_userDatabase.php'; ?>
<?php require 'mission3_10_userProcessing.php'; ?>
<?php require 'mission3_10_userHeader.php'; ?>
<?php require 'mission3_10_error.php'; ?>
<div class = "top">
<h1>NECO-BBS</h1>
<?php
if($mailFlg == TRUE)
{
  echo '<p>仮登録ありがとうございます。</p>'. "\n";
  echo '<p>登録されたメールアドレスにURLを送信いたしました。</p>'. "\n";
  echo '<p>本登録をよろしくお願いします。</p>'. "\n";
}
?>
<p><a href = "mission3_10.php">トップへ戻る</a></p>
</div>
<?php require 'mission3_10_userFooter.php'; ?>
