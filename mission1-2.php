<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
</head>
<body>
  <?php
  $fname = 'output1-2.txt';
  $fp = fopen($fname, 'w');
  fwrite($fp, 'test');
  fclose($fp);
  ?>
  <p><a href="../mission1">戻る</a></p>
</body>
</html>
