<?php
//コメントが未入力時のエラー処理
if(isset($_REQUEST['comment']))
  if($_REQUEST['comment'] == '')
    echo '<font color = "red">コメントが未入力です。</font><br>'. "\n";
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
//編集時のコメントが未入力時のエラー処理
if(isset($_REQUEST['editComment']))
  if($_REQUEST['editComment'] == '')
    echo '<font color = "red">コメントが未入力です。</font><br>'. "\n";
?>
