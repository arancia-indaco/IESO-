<?php
Class UserDatabase extends PDO
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
        userID varchar(6) not null,
        name varchar(255) not null,
        mail varchar(255) not null,
        password varchar(255) not null,
        entryTime datetime,
        status varchar(10),
        primary key(userID)
      ) engine = InnoDB";
    $this->query($sql);
  }

  //データ挿入
  public function insertData($tbName, $name, $mail, $password)
  {
    do
    {
      $userID = substr(str_shuffle(str_repeat('0123456789', 6)), 0, 6);
    }while($this->query("SELECT userID FROM $tbName WHERE userID = $userID") == FALSE);
    $timeObj = new DateTime(null, new DateTimeZone('Asia/Tokyo'));
    $status = '仮登録';
    $sql = "INSERT INTO $tbName(userID, name, mail, password, entryTime, status) VALUES(:userID, :name, :mail, :password, :entryTime, :status)";
    $stmt = $this->prepare($sql);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':entryTime', $timeObj->format('Y-m-d H:i:s'), PDO::PARAM_STR);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->execute();
    return $userID;
  }

  //本登録処理
  public function entryData($tbName, $userID)
  {
    $timeObj = new DateTime(null, new DateTimeZone('Asia/Tokyo'));
    $status = '本登録';
    $sql = "UPDATE $tbName SET entryTime = :entryTime, status = :status WHERE userID = $userID and status = '仮登録'";
    $stmt = $this->prepare($sql);
    $stmt->bindParam(':entryTime', $timeObj->format('Y-m-d H:i:s'), PDO::PARAM_STR);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    return $stmt->execute();
  }

  //データ編集
  public function updateData($tbName, $name, $userID)
  {
    $sql = "UPDATE $tbName SET name = :name WHERE userID = $userID";
    $stmt = $this->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
  }

  //データ削除
  public function deleteData($tbName, $userID)
  {
    $sql = "DELETE FROM $tbName WHERE userID = $userID";
    $this->query($sql);
  }

  //キー取得
  public function getID($tbName)
  {
    $sql = "SELECT userID FROM $tbName WHERE status = '本登録' OR status = '仮登録' ORDER BY entryTime ASC";
    return $this->query($sql)->fetchAll(PDO::FETCH_COLUMN);
  }

  //レコード取得
  public function getRecord($tbName, $userID)
  {
    $sql = "SELECT userID, name, mail, entryTime, status FROM $tbName WHERE userID = $userID";
    return $this->query($sql)->fetch(PDO::FETCH_ASSOC);
  }

  //パスワードの一致確認
  public function matchPassword($tbName, $userID, $password)
  {
    $sql = "SELECT password FROM $tbName WHERE status = '管理者' AND userID = $userID";
    return (array('password' => $password) === $this->query($sql)->fetch(PDO::FETCH_ASSOC)) ? TRUE : FALSE;
  }

  //データ選択
  public function selectData($tbName)
  {
    $sql = "SELECT userID, name, mail, entryTime, status FROM $tbName WHERE status = '本登録' OR status = '仮登録' ORDER BY entryTime ASC";
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
  }
}
?>
