<?php
//在0~9和大小写字母之间产生四位验证码
$array = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
$index = array_rand($array, 4);
shuffle($index);
$checkcode = '';
foreach ($index as $i) {
    $checkcode .= $array[$i];
}
//将验证码保存在session中
session_start();
$_SESSION['checkcode'] = strtolower($checkcode);
//创建画布并将验证码写入画布
$bg_path = './captcha/captcha_bg' . rand(2, 3) . '.gif';
$im = imagecreatefromgif($bg_path);

$color = imagecolorallocate($im, 255, 255, 255);
if (rand(1, 2) == 2) {
    $color = imagecolorallocate($im, 0, 0, 0);
}
$font = 5;
$x = (imagesx($im) - imagefontwidth($font) * 4) / 2;
$y = (imagesy($im) - imagefontheight($font)) / 2;

imagestring($im,$font,$x,$y,$checkcode,$color);
//imagettftext($im,20,0,20,10,$color,'./verdana.ttf',$checkcode);
header("content-type:image/gif");
imagegif($im);
imagedestroy($im);

?>