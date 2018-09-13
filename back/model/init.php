<?php
@header("Content-Type:text/html;charset=utf-8");
//跳转函数
function jump($url,$info=null,$time=1){
    if($info == null){
        header("Location:$url");
        die();
    }else{
        header("refresh:$time;url=$url");
        die("$info");
    }
}
//防止脚本注入
function escapeString($str){
    return addslashes(strip_tags(trim($str)));
}
//防止sql注入攻击
function sqlString($str){
    return mysql_real_escape_string($str);
}
//验证登录
function is_login(){
    //验证登录
    if(!isset($_COOKIE['user_name'])){
        jump('../../home/login.php','您还未登录，请先登录！');
    }
    if($_COOKIE['role'] != 0){
        jump('../../home/index.php','您不是管理员，无法访问');
    }
}
?>