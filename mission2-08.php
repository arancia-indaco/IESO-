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
      //テーブル作成
      $sql = "CREATE TABLE IF NOT EXISTS $tbName
        (
          id int auto_increment not null,
          name varchar(255) not null,
          comment text,
          record datetime,
          primary key(id)
        )";
      $result = $pdo -> query($sql);
      if(!$result)
        echo 'テーブル作成失敗<br>', "\n";
      else
        echo 'テーブル作成成功<br>', "\n";
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
