<?php
session_start();
include('conn.php');

if( $_POST['content'] != '' ){
    $sql = "Update member Set content='".$_POST['content']."' Where account='".$_GET['login']."'";
    $rs = mysql_query($sql) or die(mysql_error());
    $message = '修改成功!';
}else{
    $url = './';
    header( 'Location: '.$url );
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>OWASP_LAB2</title>
</head>
<body>

<h1><?php print($message);?></h1>
<h1><a href="./member.php?login=<?php print($_GET['login']);?>">回修改頁面</a></h1>
<h1><a href="./">回登入頁面</a></h1>

</body>
</html>
