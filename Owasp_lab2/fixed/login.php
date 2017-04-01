<?php
session_start();
include('conn.php');

if( $_POST['login_id'] != '' && $_POST['login_pwd'] != '' ){
    $sql = 'Select * From member Where account=? And password=?';
    $sql_array = array($_POST['login_id'], sha1($_POST['login_pwd']));
    $sth = $db -> prepare($sql);
    $sth -> execute($sql_array);
    if($sth -> errorCode() == '00000'){
        $rs = $sth -> fetchAll();
    }
    if( $sth -> rowCount() == 1 ){
        $_SESSION['login'] = $_POST['login_id'];
        $url = 'member.php';
    }else{
        $url = './';
    }
}else{
    $url = './';
}
header( 'Location: '.$url );
?>
