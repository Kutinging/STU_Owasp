<?php
header("Content-Type:text/html; charset=utf-8");
session_start();

if( $_GET['login'] == 'user' ){
    $_SESSION['login'] = 'user';
    $url = 'user.php';
}else if( $_GET['login'] == 'admin' ){
    $_SESSION['login'] = 'admin';
    $url = 'admin.php';
}else{
    $url = './';
}

header( 'Location: '.$url );
?>
