<?php
$conn = mysql_connect('127.0.0.1', 'account', 'password') or die('Error with MySQL connection');
mysql_query("SET NAMES 'utf8'");
mysql_select_db('owasp_lab2');

date_default_timezone_set("Asia/Taipei");
?>
