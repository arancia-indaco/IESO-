<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
</head>
<body>
  <?php
  $fname = 'output1-6.txt';
  $farray = file($fname);
  for($i = 0; $i < count($farray); $i++)
    echo $i + 1, '：', $farray[$i], "<br>\n";
  ?>
  <p><a href="../mission1">戻る</a></p>
</body>
</html>
