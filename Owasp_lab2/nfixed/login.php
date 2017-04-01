<?php
session_start();
include('conn.php');
if( $_POST['login_id'] != '' && $_POST['login_pwd'] != '' ){
    $account = $_POST['login_id'];
    $password = $_POST['login_pwd'];
    $sql = "Select * From member Where account='".$account."' And password='".$password."'";
    print($sql);
    $rs = mysql_query($sql) or die(mysql_error());
    if( mysql_num_rows($rs) > 0 ){
        $row = mysql_fetch_assoc($rs);
        $url = 'member.php?login='.$row['login_id'];
    }
}else{
    $url = './';
}
header( 'Location: '.$url );
?>
