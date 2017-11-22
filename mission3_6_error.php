<?php
//名前が未入力時のエラー処理
if(isset($_REQUEST['name']))
  if($_REQUEST['name'] == '')
    echo '<font color = "red">名前が未入力です。</font><br>'. "\n";
//登録時のパスワードが未入力時のエラー処理
if(isset($_REQUEST['entryPW']))
  if($_REQUEST['entryPW'] == '')
    echo '<font color = "red">パスワードが未入力です。</font><br>', "\n";
//登録時のパスワード（確認用）が未入力時のエラー処理
if(isset($_REQUEST['checkPW']))
  if($_REQUEST['checkPW'] == '')
    echo '<font color = "red">パスワード（確認用）が未入力です。</font><br>', "\n";
//登録時のパスワードが不一致の場合のエラー処理
if(isset($_REQUEST['entryPW']) && isset($_REQUEST['checkPW']))
  if($_REQUEST['entryPW'] != '' && $_REQUEST['checkPW'] != '')
    if($_REQUEST['entryPW'] != $_REQUEST['checkPW'])
      echo '<font color = "red">パスワードが一致しません。</font><br>', "\n";
//ログイン時のIDが未入力時のエラー処理
if(isset($_REQUEST['loginID']))
  if($_REQUEST['loginID'] == '')
    echo '<font color = "red">IDが未入力です。</font><br>', "\n";
//ログイン時のパスワードが未入力時のエラー処理
if(isset($_REQUEST['loginPW']))
  if($_REQUEST['loginPW'] == '')
    echo '<font color = "red">パスワードが未入力です。</font><br>', "\n";
//ログイン時のIDとパスワードが不一致の場合のエラー処理
if(isset($matchFlg))
  if(!$matchFlg)
    echo '<font color = "red">IDとパスワードが一致しません。</font><br>', "\n";
//編集時の名前が未入力時のエラー処理
if(isset($_REQUEST['editName']))
  if($_REQUEST['editName'] == '')
    echo '<font color = "red">名前が未入力です。</font><br>'. "\n";
?>
