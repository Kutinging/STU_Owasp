<?php
header("Content-Type:text/html; charset=utf-8");
session_start();

if( $_SESSION['login'] != 'admin' || $_SESSION['token'] != $_GET['token'] ){
    $url = './';
}else{

    $f = fopen('money.csv','r+');
    $m = fgetcsv($f, 'w+');
    $money = $m[0];
    print($money);
    if( $_SESSION['login'] == 'admin' ){
        file_put_contents('money.csv', $money-$_GET['cost']);
        $url = 'admin.php';
    }else{
        $url = './';
    }
    fclose($f);
}

header( 'Location: '.$url );
?>
