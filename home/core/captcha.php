<?php

/**
 * 制作验证码
 */
// 1,创建画布
$img = imagecreatetruecolor(170, 40);

// 2, 填充背景色
$backcolor = imagecolorallocate($img, mt_rand(200,255), mt_rand(150,255), mt_rand(200,255));
imagefill($img, 0, 0, $backcolor);

// 3, 产生随机验证码字符串
$arr = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
shuffle($arr);
$rand_keys = array_rand($arr, 4);
$str = '';
foreach ($rand_keys as $value) {
    $str .= $arr[$value];
}
//保存到session变量中
session_start();
$_SESSION['captcha'] = $str;
// 4, 绘制文字
// 计算字符间距
$span = floor(170/(4+1));
for($i=1;$i<=4;$i++) {
    $stringcolor = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,100), mt_rand(0,80));
    imagestring($img, 5, $i*$span, 12, $str[$i-1], $stringcolor);
}


// 5,添加干扰线
for($i=1;$i<=6;$i++) {
    $linecolor = imagecolorallocate($img, mt_rand(0,150), mt_rand(30,250), mt_rand(200,255));
    imageline($img,mt_rand(0,169),mt_rand(0,39),mt_rand(0,169),mt_rand(0,39),$linecolor);
}

// 6,添加干扰点
for($i=1;$i<=170*40*0.02;$i++) {
    $pixelcolor = imagecolorallocate($img, mt_rand(100,150), mt_rand(0,120), mt_rand(0,255));
    imagesetpixel($img, mt_rand(0,169),mt_rand(0,39), $pixelcolor);
}

// 7,输出图片
// 设置响应头信息
header("Content-type:image/png");
// 清理数据缓冲区
ob_clean();
imagepng($img);//  输出图片

// 8,销毁图片(释放资源)
imagedestroy($img);