<?php
session_start();
include('conn.php');

if( $_POST['content'] != '' ){
    $sql = 'Select * From article Where account=?';
    $sql_array = array($_SESSION['login']);
    $sth = $db -> prepare($sql);
    $sth -> execute($sql_array);
    if($sth -> errorCode() == '00000'){
        $rs = $sth -> fetchAll();
    }

    if( count($rs) == 1 ){
        $sql = 'Update article Set content=? Where account=?';
        $sql_array = array($_POST['content'], $_SESSION['login']);
        $sth = $db -> prepare($sql);
        $sth -> execute($sql_array);
        if($sth -> errorCode() == '00000'){
            $message = '修改成功!';
        }else{
            $message = '修改失敗!';
        }
    }else{
        $sql = 'Insert Into article values(null,?,?)';
        $sql_array = array($_SESSION['login'], $_POST['content']);
        $sth = $db -> prepare($sql);
        $sth -> execute($sql_array);
        if($sth -> errorCode() == '00000'){
            $message = '新增成功!';
        }else{
            $message = '新增失敗!';
        }
    }
    print('<h1>'.$message.'</h1>');
    print('<h1><a href="./member.php">回修改頁面</a></h1>');
    print('<h1><a href="./">回登入頁面</a></h1>');
}else{
    $url = './';
    header( 'Location: '.$url );
}

?>
