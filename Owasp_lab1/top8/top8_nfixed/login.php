<?php
header("Content-Type:text/html; charset=utf-8");
session_start();

if( $_POST['login_id'] == 'admin' && $_POST['login_pwd'] == 'P@ssw0rd' ){
    $_SESSION['login'] = 'admin';
    $url = 'admin.php';
}else{
    $url = './';
}

header( 'Location: '.$url );
?>
