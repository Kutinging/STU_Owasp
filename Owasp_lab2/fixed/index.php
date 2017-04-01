<?php
session_start();
unset($_SESSION['login']);
?>
<form name="form1" action="login.php" method="post">
<p> 帳號: <input type="text" name="login_id"> </p>
<p> 密碼: <input type="password" name="login_pwd"> </p>
<p> <input type="submit" name="submit" value="登入"> </p>
</form>
