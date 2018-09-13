<?php
header("Content-Type:text/html;charset=utf-8");
require_once './core/MySQLDB.php';
require_once './init.php';
$num = $_GET['num'];
if ($num == 1) {
    $username = $_GET['name'];
    if(strlen($username) !=0 ){
        if(strlen($username) < 4){
            echo "用户名太短，至少四位";
        }else{
            $sql = "select * from `user` where name='$username'";
            $res = my_query($sql);
            $rows = mysql_num_rows($res);
            if ($rows >= 1) {
                echo "用户名已存在";
            }  else {
                echo "OK";
            }
        }
    }else{
        echo "用户名不能为空";
    }


}
if ($num == 2) {
    $username = $_GET['name'];
    $sql = "select * from `user` where name='$username'";
    $res = my_query($sql);
    $rows = mysql_num_rows($res);
    if (!empty($username)) {
        if ($rows < 1) {
            echo "该用户不存在";
        } else {
            echo "OK";
        }
    }else{
        echo "用户名不能为空";
    }
}
if ($num == 3) {
    $checkcode = strtolower($_GET['checkcode']);
    @session_start();
    if (!empty($checkcode)) {
        if ($_SESSION['checkcode'] == $checkcode) {
            echo "验证码输入正确";
        } else {
            echo "验证码输入错误";
        }
    }
}

if( $num == 4){
    if(!isset($_COOKIE['user_name'])){
        echo "您还未登录，登录后使用";
    }
}
?>