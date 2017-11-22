<?php
//パスワードが存在しているか判断
if(isset($_REQUEST['password']) && isset($_REQUEST['check_password']))
{
  //パスワードが入力されているか判断
  if($_REQUEST['password'] != '' && $_REQUEST['check_password'] != '')
  {
    //入力されたパスワードが正しいか判断
    if(mb_convert_kana($_REQUEST['password'], 'n', 'UTF-8') == $_REQUEST['check_password'])
    {
      if(isset($_REQUEST['editNum']))
      {
        header("Location:mission2-15_editing.php?editNum=". $_REQUEST['editNum']); //リダイレクト
        exit();
      }
      if(isset($_REQUEST['delNum']))
      {
        header("Location:mission2-15_deletion.php?delNum=". $_REQUEST['delNum']); //リダイレクト
        exit();
      }
    }
  }
}
?>
<?php require 'mission2-15_database.php'; ?>
<?php
$tbName = 'BBS'; //テーブル名
try
{
  $pdo = new Database();
  if(isset($_REQUEST['editNum']))
    $record = $pdo->getRecord($tbName, $_REQUEST['editNum']);
  if(isset($_REQUEST['delNum']))
    $record = $pdo->getRecord($tbName, $_REQUEST['delNum']);
}
catch(PDOException $e)
{
  echo 'エラー：'. $e->getMessage(). '<br>'. "\n";
}
?>
<?php require 'mission2-15_header.php'; ?>
<?php require 'mission2-15_error.php'; ?>
<p>以下の投稿のパスワードを入力してください。</p>
<table border = "0" cellpadding="10" cellspacing="0">
  <tr><th>名前</th><th>コメント</th><th>日付</th></tr>
  <tr><td><?= htmlspecialchars($record['name']); ?></td><td><?= htmlspecialchars($record['comment']); ?></td><td><?= $record['record']; ?></td></tr>
</table>
<form action = "mission2-15_password.php" method = "post">
  <p>パスワード<br><input type = "password" name = "password" size = "50" value = ""><br></p>
  <input type = "hidden" name = "check_password" value = "<?= $record['password']; ?>">
  <?php
  if(isset($_REQUEST['editNum']))
    echo '<input type = "hidden" name = "editNum" value = "'. $_REQUEST['editNum']. '">';
  if(isset($_REQUEST['delNum']))
    echo '<input type = "hidden" name = "delNum" value = "'. $_REQUEST['delNum']. '">';
  ?>
  <input type = "submit" value = "決定">
</form>
<form action = "mission2-15.php" method = "post">
  <input type = "submit" value = "キャンセル">
</form>
<?php require 'mission2-15_footer.php'; ?>
