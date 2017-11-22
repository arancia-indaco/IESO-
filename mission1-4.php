<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
</head>
<body>
  <form action = "mission1-4.php" method = "post">
    名前：
    <input type = "text" name = "name">
    <input type = "submit" value = "送信">
  </form>
  <?php
  if(isset($_REQUEST['name']))
    echo 'ようこそ、', htmlspecialchars($_REQUEST['name']), 'さん。';
  ?>
  <p><a href="../mission1">戻る</a></p>
</body>
</html>
