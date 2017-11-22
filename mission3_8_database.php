<?php
Class Database extends PDO
{
  const HOST = 'localhost';
  const DBNAME = 'データベース名';
  const USER = 'ユーザー名';
  const PASSWORD = 'パスワード';

  //データベース接続
  public function __construct()
  {
    parent::__construct("mysql:host=". self::HOST. ";dbname=". self::DBNAME. ";charset=utf8", self::USER, self::PASSWORD);
    $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  }

  //テーブル作成
  public function tbCreate($tbName)
  {
    $sql = "CREATE TABLE IF NOT EXISTS $tbName
      (
        id varchar(20) not null,
        name varchar(255) not null,
        comment text not null,
        mime varchar(15),
        binaryFile longblob,
        contributeTime datetime,
        primary key(id)
      ) engine = InnoDB";
    $this->query($sql);
    echo 'テーブル作成<br>'. "\n";
  }

  //データ挿入
  public function insertData($tbName, $name, $comment, $mime = null, $binaryFile = null)
  {
    do
    {
      $id = $_SESSION['id']. substr(str_shuffle(str_repeat('0123456789', 6)), 0, 6);
    }while($this->query("SELECT id FROM $tbName WHERE id = $id") == FALSE);
    $timeObj = new DateTime(null, new DateTimeZone('Asia/Tokyo'));
    $sql = "INSERT INTO $tbName(id, name, comment, mime, binaryFile, contributeTime) VALUES(:id, :name, :comment, :mime, :binaryFile, :contributeTime)";
    $stmt = $this->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':mime', $mime, PDO::PARAM_STR);
    $stmt->bindValue(':binaryFile', $binaryFile, PDO::PARAM_LOB);
    $stmt->bindParam(':contributeTime', $timeObj->format('Y-m-d H:i:s'), PDO::PARAM_STR);
    $stmt->execute();
    return $id;
  }

  //データ編集
  public function updateData($tbName, $comment, $id)
  {
    $sql = "UPDATE $tbName SET comment = :comment WHERE id = $id";
    $stmt = $this->prepare($sql);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->execute();
  }

  //データ削除
  public function deleteData($tbName, $id)
  {
    $sql = "DELETE FROM $tbName WHERE id = $id";
    $this->query($sql);
  }

  //フィールド取得
  public function getField($tbName, $col)
  {
    $sql = "SELECT $col FROM $tbName ORDER BY contributeTime ASC";
    return $this->query($sql)->fetchAll(PDO::FETCH_COLUMN);
  }

  //レコード取得
  public function getRecord($tbName, $id)
  {
    $sql = "SELECT id, name, comment, mime, contributeTime FROM $tbName WHERE id = $id";
    return $this->query($sql)->fetch(PDO::FETCH_ASSOC);
  }

  //ファイル取得
  public function getFile($tbName, $id)
  {
    $sql = "SELECT mime, binaryFile FROM $tbName WHERE id = $id";
    return $this->query($sql)->fetch(PDO::FETCH_ASSOC);
  }

  //ログイン情報取得
  public function getLogin($tbName, $id)
  {
    $sql = "SELECT id, name FROM $tbName WHERE id = $id";
    return $this->query($sql)->fetch(PDO::FETCH_ASSOC);
  }

  //パスワードの一致確認
  public function matchLogin($tbName, $id, $password)
  {
    $sql = "SELECT password FROM $tbName WHERE id = $id";
    return (array('password' => $password) === $this->query($sql)->fetch(PDO::FETCH_ASSOC)) ? TRUE : FALSE;
  }

  //データ選択
  public function selectData($tbName)
  {
    $sql = "SELECT id, name, comment, mime, contributeTime FROM $tbName ORDER BY contributeTime ASC";
    return $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  }

  //カラム一覧表示
  public function colList($tbName)
  {
    $sql = "SHOW COLUMNS FROM $tbName";
    $this->tbData($this->query($sql));
  }

  //テーブル一覧表示
  public function tbList()
  {
    $sql = "SHOW TABLES FROM ". self::DBNAME;
    $this->tbData($this->query($sql));
  }

  //テーブル属性表示
  public function tbField($tbName)
  {
    $sql = "SHOW CREATE TABLE $tbName";
    $this->tbData($this->query($sql));
  }

  //テーブル詳細表示
  public function tbDetail()
  {
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
    echo 'テーブル削除<br>'. "\n";
  }
}
?>
