<?php
  header("Content-Type:text/html; charset=utf-8");
?>
確認要前往該網頁嗎? 
<h3><?php print($_GET['url']);?></h3>
<p>
  <a href="<?php print($_GET['url']);?>">確定</a>
</p>
