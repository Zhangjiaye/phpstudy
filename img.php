<?php
//生成验证码背景
header("Content-type:image/jpeg;");
$width=60;
$height=15;
//创建画布，默认输出是黑色背景
$img=imagecreatetruecolor($width, $height);
//分配颜色
$white=imagecolorallocate($img, 0xff, 0xff, 0xff);
//填充颜色到画布，起始坐标
imagefill($img, 0, 0, $white);
//生成验证码
$chars='1234567890';
$chars_len=strlen($chars);
$code_len=4;//验证码长度
$code="";//初始化验证码
for ($i=0;$i<$code_len;$i++) {
	$rand=mt_rand(0,$chars_len-1);//随机取出0到9中任意一个数字,mt_rand() 使用 Mersenne Twister 算法返回随机整数
	$code.=$rand;//将取出的数字连接在一起
}
//存入session
session_start();
$_SESSION['var_code']=$code;
//随机分配字符串颜色
 $str_color=imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
 //计算字符串的居中显示
 //字体的大小
 $font=5;
 //画布尺寸,获取图像宽度与高度
 $img_w=imagesx($img);
 $img_h=imagesy($img);
 //字体的尺寸,获取文字宽度与高度
 $font_w=imagefontwidth($font);
 $font_h=imagefontheight($font);
//字符串的尺寸
$code_w=$font_w*$code_len;
$code_h=$font_h;
$x=($img_w-$code_w)/2;
$y=($img_h-$code_h)/2;
 //把验证码输出到画布上,如果font 是 1，2，3，4 或 5，则使用内置字体。
 imagestring($img, $font, $x, $y, $code, $str_color);
 //直接输出
imagejpeg($img);
imagedestroy($img);
?>