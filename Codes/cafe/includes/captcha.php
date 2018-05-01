<?php
session_start(); 
$no_of_words = 6;
$width = 100;
$height = 25;

$phrase = "";
for($i = 0;  $i < $no_of_words; $i++):
    $phrase .= chr(rand(97,122));
endfor;
$_SESSION['captcha'] = $phrase;

$image = imagecreatetruecolor($width, $height);
$bgd_color = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 255, 0 , 0);
$graphic_color = imagecolorallocate($image, 0, 255, 0);
$graphic_color2 = imagecolorallocate($image, 0, 0, 255);

imagefilledrectangle($image, 0, 0, $width, $height, $bgd_color);

for($i = 1; $i < $no_of_words; $i++):
    imageline($image, 0, rand(0, $height), rand(0, $width), rand(0, $height), $graphic_color);
endfor;

for($i = 1; $i < ($no_of_words * 10); $i++):
    imagesetpixel($image, rand(0, $width), rand(0, $height), $graphic_color2);
endfor;

imagettftext($image, 15, 0, 20, 20, $text_color, $_SERVER['DOCUMENT_ROOT']."/cafe/vendor/fonts/ubuntu/Ubuntu-regular.ttf", $phrase);
header("Cache-Control: no-cache, must-revalidate");
header("Content-Type: image/png");
imagepng($image);
imagedestroy($image);


