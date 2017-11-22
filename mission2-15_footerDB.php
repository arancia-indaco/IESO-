<?php
try
{
  $pdo->showData($tbName);
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
