<?php
header("Content-Type:text/html; charset=utf-8");
session_start();

unset($_SESSION['login']);
?>
<p>我想用 <a href="login.php?login=admin">Admin</a> 角色進入系統</p>
<p>我想用 <a href="login.php?login=user">User</a> 角色進入系統</p>
