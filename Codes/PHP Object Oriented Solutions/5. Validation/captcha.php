<?php
session_start();
$width = 100;
$height = 30;

$total_char = 5;
$generate_string = "";

for($i = 0; $i < $total_char; $i++){
	$generate_string .= chr(rand(97,122));
}

setcookie("captcha", $generate_string);
$_SESSION["captcha"] =  $generate_string;
$image = imagecreatetruecolor($width, $height);
$bgd_color = imagecolorallocate($image, 255, 0, 0);
$text_color = imagecolorallocate($image, 0, 0, 0);
$graphic_color = imagecolorallocate($image, 0, 0, 150);

imagefilledrectangle($image, 0, 0, $width, $height, $bgd_color);

for($i = 0; $i < $total_char; $i++):
	imageline($image, 0, rand(0, $height), $width, rand(0, $height), $graphic_color);
endfor;

for($i = 0; $i < ($total_char*10); $i++):
	imagesetpixel($image, rand(0, $width), rand(0, $height), $graphic_color);
endfor;


imagefttext($image, 15, 0, 20, 20, $text_color, "font/Gloria-Hallelujah-regular.ttf", $generate_string);

imagepng($image);
imagedestroy($image);

header("Cache-Control: no-cache, must-revalidate");
header("Content-Type: image/png");
?>