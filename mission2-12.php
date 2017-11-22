<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
</head>
<body background = "../sample/bgcat1.gif">
  <?php
    $host = 'localhost';
    $dbName = 'データベース名';
    $user = 'ユーザー名';
    $pass = 'パスワード';
    $tbName = 'tb_1'; //テーブル名
    try
    {
      //データベース接続
      $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $user, $pass);
      if($pdo == null)
        echo '接続に失敗しました。<br>', "\n";
      else
        echo '接続に成功しました。<br>', "\n";
      //データ表示
      $sql = "SELECT * FROM $tbName";
      $result = $pdo -> query($sql);
      if(!$result)
        echo 'データ取得失敗。<br>', "\n";
      else
        while($row = $result -> fetch(PDO::FETCH_ASSOC))
        {
          foreach($row as $key => $hoge)
            echo "$key : $hoge&nbsp;&nbsp;&nbsp;";
          echo "<br>\n";
        }
      $pdo = null;
    }
    catch(PDOException $e)
    {
      echo 'エラー：'. $e -> getMessage(). '<br>', "\n";
      exit();
    }
  ?>
  <!--戻るボタン-->
  <form action = "../mission2">
    <button type = "submit">
      <img src = "../sample/scat7.gif" width = "50" height = "50">
    </button>
  </form>
</body>
</html>
