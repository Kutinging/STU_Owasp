<?php
header("Content-Type:text/html; charset=utf-8");
session_start();
if( $_SESSION['login'] != 'user' ){
    header('Location: ./unsafe.php');
}
?>
<h1>您現在的身分是 <span style="color:red;"><?php print($_SESSION['login']);?></span> </h1>
<h1>這是 <span style="color:red;">User</span> 頁面</h1>
<p> <a href="./">回首頁</a> </p>
