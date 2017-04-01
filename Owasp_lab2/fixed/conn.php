<?php
$dsn = "mysql:host=127.0.0.1;dbname=test";
$db = new PDO($dsn, "account", "password", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

?>
