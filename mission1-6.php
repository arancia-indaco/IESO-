<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
</head>
<body>
  <p>入力フォーム</p>
  <form action = "mission1-6.php" method = "post">
    <input type = "text" name = "str">
    <input type = "submit" value = "送信">
  </form>
  <?php
  if(isset($_REQUEST['str']))
  {
    $fname = 'output1-6.txt';
    $fp = fopen($fname, 'a');
    fwrite($fp, $_REQUEST['str']);
    fwrite($fp, "\n");
    fclose($fp);
    print '<a href="../mission1/output1-6.txt">こちら</a>';
    echo 'に送信しました。';
  }
  ?>
  <p><a href="../mission1">戻る</a></p>
</body>
</html>
