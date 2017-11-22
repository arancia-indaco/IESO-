<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
</head>
<body>
  <p>入力フォーム</p>
  <form action = "mission1-5.php" method = "post">
    <input type = "text" name = "str">
    <input type = "submit" value = "送信">
  </form>
  <?php
  if(isset($_REQUEST['str']))
  {
    $fname = "output1-5.txt";
    $fp = fopen($fname, 'w');
    fwrite($fp, $_REQUEST['str']);
    fclose($fp);
    print '<a href="../mission1/output1-5.txt">こちら</a>';
    echo 'に送信しました。';
  }
  ?>
  <p><a href="../mission1">戻る</a></p>
</body>
</html>
