<?php
header("Content-Type:text/html;charset=utf-8");
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
        jump('./login.php','您还未登录，请先登录！');
    }
}
//替换敏感词汇
function isChinese($s)
{
    if (preg_match('/^[\x{4e00}-\x{9fa5}]+$/u', $s) > 0) {
        return true;
    }
}

function sensitive($str)
{
    $file = "./core/Sensitive.txt";
    $content2 = file_get_contents($file);
    $content = mb_convert_encoding($content2, 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
    $sensitive = explode("\r\n", $content);
    for ($i = 0; $i < count($sensitive); $i++) {
        $count = substr_count($str, $sensitive[$i]);
        if ($count > 0) {
            //echo "出现敏感词汇:".$sensitive[$i];
            $num = strlen($sensitive[$i]);
            if (isChinese($sensitive[$i])) {
                $num = $num / 3;
            }
            $a = str_repeat('*', $num);
            //var_dump($a);
            $str = str_replace($sensitive[$i], $a, $str);
        }
    }
    return $str;
}
?>