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
//拡張子のエラー処理
if(isset($extension))
  if(!in_array($extension, $fileExt, TRUE))
    echo '<font color = "red">対応していない拡張子です。</font><br>', "\n";
//ファイルサイズエラー処理
if($uploadFlg == TRUE)
  if($_FILES['upFile']['size'] >= 1000000)
    echo '<font color = "red">ファイルのサイズが大きすぎます。</font><br>', "\n";
//エンコードエラー処理
if($uploadFlg == TRUE)
  if(!isset($mime) || $binaryFile === FALSE)
    echo '<font color = "red">添付ファイルを保存できませんでした。</font><br>', "\n";
?>
