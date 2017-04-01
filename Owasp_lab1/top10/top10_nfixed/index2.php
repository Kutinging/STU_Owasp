<?php
header("Content-Type:text/html; charset=utf-8");

if( !empty($_GET['url']) ){
    header( 'Location: '.$_GET['url'] );
}

?>
