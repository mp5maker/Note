<?php 
$no_of_words = 5;
$width = 100;
$height = 20;

$phrase = "";
for($i = 0;  $i < $no_of_words; $i++){
	$phrase .= chr(rand(97,122));
}
	$image = imagecreatetruecolor($width, $height);
	$bgd_color = imagecolorallocate($image, 255, 255, 255);
	$text_color = imagecolorallocate($image, 255, 0 , 0);
	$graphic_color = imagecolorallocate($image, 0, 255, 0);
	$graphic_color2 = imagecolorallocate($image, 0, 0, 255);
  
    imagefilledrectangle($image, 0, 0, $width, $height, $bgd_color);
    
    for($i = 1; $i < $no_of_words; $i++){
    	imageline($image, 0, rand(0, $height), rand(0, $width), rand(0, $height), $graphic_color);
    }

    for($i = 1; $i < ($no_of_words * 10); $i++){
	    imagesetpixel($image, rand(0, $width), rand(0, $height), $graphic_color2);
    }

    imagestring($image, 5, 25, 3, $phrase, $text_color);
    header("Cache-Control: no-cache, must-revalidate");
    header("Content-Type: image/png");
    imagepng($image);
    imagedestroy($image);
?>
