<?php
Class Database extends PDO
{
  const HOST = 'localhost';
  const DBNAME = 'データベース名';
  const USER = 'ユーザー名';
  const PASSWORD = 'パスワード';
  private $count = null;

  //データベース接続
  public function __construct()
  {
    parent::__construct("mysql:host=". self::HOST. ";dbname=". self::DBNAME. ";charset=utf8", self::USER, self::PASSWORD);
    $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // echo "データベースに接続しました。<br>\n";
  }

  //テーブル作成
  public function tbCreate($tbName)
  {
    $sql = "CREATE TABLE IF NOT EXISTS $tbName
      (
        id int auto_increment not null,
        name varchar(255) not null,
        comment text not null,
        record datetime,
        password varchar(255) not null,
        primary key(id)
      )";
    $this->query($sql);
    // echo "テーブルを作成しました。<br>\n";
  }

  //データ挿入
  public function insertData($tbName, $name, $comment, $password)
  {
    $sql = "INSERT INTO $tbName(name, comment, record, password) VALUES(:name, :comment, NOW(), :password)";
    $stmt = $this->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    // echo "データを挿入しました。<br>\n";
  }

  //データ編集
  public function editData($tbName, $name, $comment, $id)
  {
    $sql = "UPDATE $tbName SET name = :name, comment = :comment, record = NOW() WHERE id = $id";
    $stmt = $this->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->execute();
    // echo "データを編集しました。<br>\n";
  }

  //データ削除
  public function deleteData($tbName, $id)
  {
    $sql = "DELETE FROM $tbName WHERE id = $id";
    $this->query($sql);
    // echo "データを削除しました。<br>\n";
  }

  //レコード数取得
  public function countRecord($tbName)
  {
    // echo "レコード数を取得します。<br>\n";
    $sql = "SELECT COUNT(*) FROM $tbName";
    return $this->count = $this->query($sql)->fetchColumn();
  }

  //ID取得
  public function getID($tbName)
  {
    // echo "IDを取得します。<br>\n";
    $sql = "SELECT id FROM $tbName";
    return $this->query($sql)->fetchAll(PDO::FETCH_COLUMN);
  }

  //レコード取得
  public function getRecord($tbName, $id)
  {
    // echo "レコードを取得します。<br>\n";
    $sql = "SELECT * FROM $tbName WHERE id = $id";
    return $this->query($sql)->fetch(PDO::FETCH_ASSOC);
  }

  //データ表示
  public function showData($tbName)
  {
    // echo "データを表示します。<br>\n";
    $sql = "SELECT name, comment, record FROM $tbName ORDER BY id ASC";
    // $sql = "SELECT * FROM $tbName ORDER BY id ASC";
    $result = $this->query($sql);
    echo '<table border = "0" cellpadding="10" cellspacing="0">'. "\n";
    echo '<tr>'. "\n";
    echo '<th>番号</th><th>名前</th><th>コメント</th><th>日付</th>'. "\n";
    // echo '<tr><th>番号</th><th>ID</th><th>名前</th><th>コメント</th><th>日付</th><th>PW</th></tr>'. "\n";
    echo '</tr>'. "\n";
    for($i = 1; $i <= $this->count; $i++)
    {
      echo '<tr>'. "\n";
      echo '<td align="right">'. $i. '</td>'. "\n";
      $row = $result->fetch(PDO::FETCH_ASSOC);
      foreach($row as $hoge)
        echo '<td align="center">'. htmlspecialchars($hoge). '</td>'. "\n";
      echo '</tr>'. "\n";
    }
    echo '</table>'. "\n";
  }

  //テーブル一覧表示
  public function tbList()
  {
    // echo "テーブルの一覧を表示します。<br>\n";
    $sql = "SHOW TABLES FROM ". self::DBNAME;
    $this->tbData($this->query($sql));
  }

  //テーブル属性表示
  public function tbField($tbName)
  {
    // echo "テーブルの属性を表示します。<br>\n";
    $sql = "SHOW CREATE TABLE $tbName";
    $this->tbData($this->query($sql));
  }

  //テーブル詳細表示
  public function tbDetail()
  {
    // echo "テーブルの詳細を表示します。<br>\n";
    $sql = "SHOW TABLE STATUS FROM ". self::DBNAME;
    $this->tbData($this->query($sql));
  }

  //テーブルデータ表示
  public function tbData($result)
  {
    while($row = $result->fetch(PDO::FETCH_ASSOC))
      foreach($row as $key=>$data)
        echo "$key : $data<br>\n";
  }

  //テーブル削除
  public function tbDelete($tbName)
  {
    $sql = "DROP TABLE IF EXISTS $tbName";
    $this->query($sql);
    // echo "テーブルを削除しました。<br>\n";
  }
}
?>
