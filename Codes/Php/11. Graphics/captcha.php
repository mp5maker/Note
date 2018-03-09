<?php 
$number_of_words = 5;
$width = 100;
$height = 25;

//Creating random words
$pass_phrase = "";
for($i = 0; $i < $number_of_words; $i++){
	$pass_phrase .= chr(rand(97,122));
}

//Allocating Color
$image = imagecreatetruecolor($width, $height);
$bgd_color = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0);
$graphic_color = imagecolorallocate($image, 255, 0, 0);


imagefilledrectangle($image, 0, 0, $width, $height, $bgd_color);
for($i = 0; $i < 5; $i++){
	imageline($image, 0, rand(0, $height), rand(0, $width), rand(0, $height), $graphic_color);
}

for($i = 0; $i < 50; $i++){
	imagesetpixel($image, rand(0, $width), rand(0, $height), $graphic_color);
}

imagestring($image, 5, 10, 9, $pass_phrase, $text_color);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?>