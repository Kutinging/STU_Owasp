<?php
session_start();
include('conn.php');

$sql = "Select * From member Where account='".$_GET['login']."'";
$rs = mysql_query($sql) or die(mysql_error());
if( mysql_num_rows($rs) == 1 ){
    $row = mysql_fetch_assoc($rs);
    $content = $row['content'];
}else{
    $content = '';
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>OWASP_LAB2</title>
</head>
<body>

<p> <a href="./">回首頁</a> </p>
<form action="mod.php?login=<?php print($_GET['login']);?>" method="post">
<h1>您現在的身分是 <span style="color:red;"><?php print($_GET['login']);?></span></h1>
<h1>這是 <span style="color:red;">自我介紹預覽</span></h1>
<p><?php print(nl2br($content));?></p>
<h1>這是 <span style="color:red;">編輯自我介紹</span></h1>
<p><textarea name="content" id="content" cols="30" rows="10"><?php print($content);?></textarea></p>
<p> <input type="submit" name="submit" value="確定"> </p>
</form>

</body>
</html>
