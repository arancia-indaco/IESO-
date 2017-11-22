<?php
//名前が未入力時のエラー処理
if(isset($_REQUEST['name']))
  if($_REQUEST['name'] == '')
    echo '<font color = "red">名前が未入力です。</font><br>'. "\n";
//コメントが未入力時のエラー処理
if(isset($_REQUEST['comment']))
  if($_REQUEST['comment'] == '')
    echo '<font color = "red">コメントが未入力です。</font><br>'. "\n";
//パスワードが未入力時のエラー処理
if(isset($_REQUEST['password']))
  if($_REQUEST['password'] == '')
    echo '<font color = "red">パスワードが未入力です。</font><br>', "\n";
//パスワード（確認用）が未入力時のエラー処理
if(isset($_REQUEST['check_password']))
  if($_REQUEST['check_password'] == '')
    echo '<font color = "red">パスワード（確認用）が未入力です。</font><br>', "\n";
//パスワード、パスワード（確認用）が不一致の場合のエラー処理
if(isset($_REQUEST['password']) && isset($_REQUEST['check_password']))
  if($_REQUEST['password'] != $_REQUEST['check_password'])
    echo '<font color = "red">パスワードが一致しません。</font><br>', "\n";
//名前が未入力時のエラー処理
if(isset($_REQUEST['editName']))
  if($_REQUEST['editName'] == '')
    echo '<font color = "red">名前が未入力です。</font><br>'. "\n";
//コメントが未入力時のエラー処理
if(isset($_REQUEST['editComment']))
  if($_REQUEST['editComment'] == '')
    echo '<font color = "red">コメントが未入力です。</font><br>'. "\n";
?>
