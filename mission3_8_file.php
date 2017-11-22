<?php require 'mission3_8_database.php'; ?>
<?php require 'mission3_8_headerDB.php'; ?>
<?php
header('Content-type: '. $file['mime']);
echo $file['binaryFile'];
?>
