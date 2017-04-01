<?php
session_start();
include('conn.php');

$sql = 'Select * From article Where account=?';
$sql_array = array($_SESSION['login']);
$sth = $db -> prepare($sql);
$sth -> execute($sql_array);
if($sth -> errorCode() == '00000'){
    $rs = $sth -> fetchAll();
}

if( count($rs) == 1 ){
    $content = $rs[0]['content'];
}else{
    $content = '';
}
?>
<p> <a href="./">回首頁</a> </p>
<form action="mod.php" method="post">
<h1>您現在的身分是 <span style="color:red;"><?php print(htmlentities($_SESSION['login']));?></span></h1>
<h1>這是 <span style="color:red;">自我介紹預覽</span></h1>
<p><?php print(nl2br(htmlentities($content)));?></p>
<h1>這是 <span style="color:red;">編輯自我介紹</span></h1>
<p><textarea name="content" id="content" cols="30" rows="10"><?php print(htmlentities($content));?></textarea></p>
<p> <input type="submit" name="submit" value="確定"> </p>
</form>
