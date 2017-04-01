<?php
header("Content-Type:text/html; charset=utf-8");

if( !empty($_GET['url']) && $_GET['url'] != 'unsafe.php' ){
    header( 'Location: '.basename($_GET['url']) );
}

?>
