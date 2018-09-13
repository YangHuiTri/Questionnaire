<?php
/**
 * 实现文件上传
 * @param array $file 上传的文件的信息(一维数组,5个元素信息)
 * @param array $allow 允许上传的类型
 * @param string & $error 引用传递,用来记录错误信息
 * @param string $path 文件上传的目录
 * @param int $maxsize = 1048576 允许上传的文件的大小
 * @return mixed false|$newname 上传失败返回false成功返回文件的新名字
 */
function upload($file, $allow, & $error, $path, $maxsize = 1048576)
{
    //1、验证系统错误
    switch ($file['error']) {
        case 1:
            $error = "上传失败，超出文件限制大小";
            return false;
        case 2:
            $error = "上传失败，超出浏览器规定的文件大小";
            return false;
        case 3:
            $error = "上传失败，文件上传不完整";
            return false;
        case 4:
            $error = "上传失败，请先选择要上传的文件";
            return false;
        case 6:
        case 7:
            $error = "对不起，服务器系统繁忙，请稍后重试";
            return false;
    }
    //2、验证逻辑错误
    if ($file['size'] > $maxsize) {
        $error = "上传失败，超出文件限制大小";
        return false;
    }
    //验证文件的后缀名
    if (!in_array($file['type'], $allow)) {
        $error = "上传的文件类型不正确，允许的类型有：" . implode(',', $allow);
        return false;
    }
    //3、移动临时文件
    //先得到文件的随机名
    $newname = randName($file['name']);
    $target = $path.'/'.$newname;
    $result = move_uploaded_file($file['tmp_name'], $target);
    if($result) {
        return $newname;
    }else {
        $error = "发生未知错误，上传失败！";
        return false;
    }

}
/**
 * 生成一个随机名字(当前的年月日时分秒+随机数字+后缀名)
 * @param string $filename 文件的原始名字
 * @return string $newname 文件的新名字
 */
function randName($filename)
{
    //1、生成文件的时间部分
    $newname = date("YmdHis");
    //2、加上随机数部分
    $str = "0123456789";
    for ($i = 0; $i < 6; $i++) {
        $newname .= $str[mt_rand(0, strlen($str) - 1)];
    }
    //3、加上文件后缀名部分
    $newname .= strrchr($filename, '.');
    return $newname;
}
?>