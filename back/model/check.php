<?php
require_once '../core/MySQLDB.php';

$num = $_GET['num'];
if($num == 1){          //ajax修改管理员用户名
    $username = $_GET['username'];
    if(empty($username)){
        echo "用户名不能为空";
        return false;
    }
    $id = $_GET['id'];
    $sql = "select * from `user` where id=$id";
    $res = my_query($sql);
    $row = mysql_fetch_assoc($res);
    $sql = "select * from `user` where name='$username'";
    $result = my_query($sql);
    $rows = mysql_num_rows($result);
    if($rows == 1){
        if($username == $row['name']){
            echo "新用户名和旧用户名不能相同";
        }else{
            echo "该用户名已经被占用，请重新输入";
        }
    }else{
        echo "OK";
    }
}
if($num == 2){             //ajax修改普通用户用户名
    $username = $_GET['username'];
    if(empty($username)){
        echo "用户名不能为空";
        return false;
    }
    $sql = "select * from `user` where name='$username'";
    $result = my_query($sql);
    $rows = mysql_num_rows($result);
    if($rows>0){
        echo "该昵称已被占用，请重新填写";
    }else{
        echo "OK";
    }
}

if($num == 3){             //ajax确认是否上架
    $id = $_GET['id'];
    $b = my_query("update `survey` set shelves=1 where id=$id");
    if($b){
        echo "上架成功";
    }else{
        echo "上架失败";
    }
}


?>