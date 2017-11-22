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
      //テーブルの中身表示
      $sql = "SHOW CREATE TABLE $tbName";
      //テーブルの詳細表示
      // $sql = "SHOW TABLE STATUS FROM $dbName";
      $result = $pdo -> query($sql);
      if(!$result)
        echo 'テーブルデータ取得失敗。<br>', "\n";
      else
        while($row = $result -> fetch(PDO::FETCH_ASSOC))
          foreach($row as $key => $hoge)
            echo "$key : $hoge<br>\n";
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
