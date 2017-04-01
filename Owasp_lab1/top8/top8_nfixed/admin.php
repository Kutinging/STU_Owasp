<?php
header("Content-Type:text/html; charset=utf-8");
session_start();
$f = fopen('money.csv','r');
$m = fgetcsv($f, 'w+');
?>
<h1>您現在的身分是 <span style="color:red;"><?php print($_SESSION['login']);?></span> </h1>
<h1>這是 <span style="color:red;">Admin</span> 頁面</h1>
<p> <a href="./">回首頁</a> </p>

<h2> 你現在擁有: <?php print($m[0]);?> 元 </h2>
<form action="cost.php" method="get">
<p> <img src="812.jpg"> </p>
<p> 價錢: 1000元<input type="hidden" name="cost" value="1000"> </p>
<p> <input type="submit" name="submit" value="購買"> </p>
</form>
