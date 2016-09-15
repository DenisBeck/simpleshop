<?php
require '../model/lib.php';
require '../model/config.php';

$nChar = 5;
$i = imageCreateFromJPEG('../view/images/noise.jpg');
$color = imagecolorallocate($i, 64, 64, 64);
imageantialias($i, true);
$randStr = substr(md5(uniqid()), 0 , $nChar);
$_SESSION['randStr'] = $randStr;

$x = 20;
$y = 30;
$deltaX = 40;
for($j = 0;$j < $nChar; $j++) {
	$size = rand(18, 30);
	$angle = -30 + rand(0, 60);
	imagettftext($i, $size, $angle, $x, $y, $color, '../view/fonts/bellb.ttf', $randStr[$j]);
	$x += $deltaX;
}
header("Content-Type: image/jpeg");
imageJPEG($i, null, 50);