<?php require 'mission3_10_adminHeader.php'; ?>
<br><br><br>
<div class = "top">
<h1>ようこそNECO-BBSへ</h1>
<div style = "display:inline-flex">
<p>
<form action = "mission3_10_userEntry.php" method = "get">
  <input class = "submit" type = "submit" value = "新規会員登録">
</form>
<form action = "mission3_10_login.php" method = "get">
  <input class = "submit" type = "submit" value = "ログイン">
</form>
<form action = "mission3_10_adminPass.php" method = "get">
  <input class = "submit" type = "submit" value = "管理者ログイン">
</form>
</p>
</div>
</div>
<style>
.submit
{
  border: none;
  background-color: #ccffcc;
  margin: 240px 60px;
  text-align: center;
  font-size: 36px;
  width: 300px;
  border-radius: 6px;
}
</style>
<?php require 'mission3_10_adminFooter.php'; ?>
