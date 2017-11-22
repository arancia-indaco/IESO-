<?php
//名前が未入力時のエラー処理
if(isset($_REQUEST['name']))
  if($_REQUEST['name'] == '')
    echo '<font color = "red">名前が未入力です。</font><br>'. "\n";
//編集時の名前が未入力時のエラー処理
if(isset($_REQUEST['editName']))
  if($_REQUEST['editName'] == '')
    echo '<font color = "red">名前が未入力です。</font><br>'. "\n";
//メールアドレスが未入力時のエラー処理
if(isset($_REQUEST['mail']))
  if($_REQUEST['mail'] == '')
    echo '<font color = "red">メールアドレスが未入力です。</font><br>', "\n";
//メールアドレスの形式が不正な場合のエラー処理
if(isset($_REQUEST['mail']))
  if(!filter_var($_REQUEST['mail'], FILTER_VALIDATE_EMAIL))
    echo '<font color = "red">メールアドレスの形式が不正です。</font><br>', "\n";
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
  if($_REQUEST['entryPW'] != $_REQUEST['checkPW'])
    echo '<font color = "red">パスワードが一致しません。</font><br>', "\n";
//登録時のパスワードの形式が不正な場合のエラー処理
if(isset($passwordFlg))
  if($passwordFlg != 1)
    echo '<font color = "red">パスワードの形式が不正です。</font><br>', "\n";
//メール送信ができない場合のエラー処理
if(isset($mailFlg))
  if($mailFlg == FALSE)
    echo '<font color = "red">メールが送信できませんでした。</font><br>', "\n";
//本登録が正常にできない場合のエラー処理
if(isset($entryFlg))
  if($entryFlg == FALSE)
    echo '<font color = "red">本登録が正常にできませんでした。</font><br>', "\n";
//IDが未入力時のエラー処理
if(isset($_REQUEST['loginID']))
  if($_REQUEST['loginID'] == '')
    echo '<font color = "red">IDが未入力です。</font><br>', "\n";
//パスワードが未入力時のエラー処理
if(isset($_REQUEST['loginPW']))
  if($_REQUEST['loginPW'] == '')
    echo '<font color = "red">パスワードが未入力です。</font><br>', "\n";
//IDとパスワードが不一致の場合のエラー処理
if(isset($matchFlg))
  if(!$matchFlg)
    echo '<font color = "red">IDとパスワードが一致しません。</font><br>', "\n";
//コメントが未入力時のエラー処理
if(isset($_REQUEST['comment']))
  if($_REQUEST['comment'] == '')
    echo '<font color = "red">コメントが未入力です。</font><br>'. "\n";
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
  if($_FILES['upFile']['size'] >= 1024 * 1024)
    echo '<font color = "red">ファイルのサイズが大きすぎます。</font><br>', "\n";
//エンコードエラー処理
if($uploadFlg == TRUE)
  if(!isset($mime) || $binaryFile === FALSE)
    echo '<font color = "red">添付ファイルを保存できませんでした。</font><br>', "\n";
?>
