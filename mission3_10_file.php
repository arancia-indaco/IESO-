<?php require 'mission3_10_database.php'; ?>
<?php
$tbName = 'NECO_BBS'; //テーブル名
$pdo = new Database();
$file = $pdo->getFile($tbName, $_REQUEST['id']);
header('Content-type: '. $file['mime']);
echo $file['binaryFile'];
?>
