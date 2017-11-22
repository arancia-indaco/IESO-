<?php require 'mission3_9_database.php'; ?>
<?php require 'mission3_9_headerDB.php'; ?>
<?php require 'mission3_9_header.php'; ?>
<?php require 'mission3_9_error.php'; ?>
<?php
if($mailFlg == TRUE)
{
  echo '<p>仮登録ありがとうございます。</p>'. "\n";
  echo '<p>登録されたメールアドレスにURLを送信いたしました。</p>'. "\n";
  echo '<p>本登録をよろしくお願いします。</p>'. "\n";
}
?>
<p><a href="mission3_9_entry.php">会員登録フォームへ戻る</a></p>
<?php require 'mission3_9_footer.php'; ?>
