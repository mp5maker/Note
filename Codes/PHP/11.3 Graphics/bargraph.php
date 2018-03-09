<?php 
function draw_bar_graph($width, $height, $data, $max_value, $filename){
	$image = imagecreatetruecolor($width, $height);
	$bg_color = imagecolorallocate($image, 255, 255, 255);
	$text_color = imagecolorallocate($image, 0, 255, 0);
	$bar_color = imagecolorallocate($image, 255, 0, 0);
	$border_color = imagecolorallocate($image, 0, 0, 255);

	imagefilledrectangle($image, 0, 0, $width, $height, $bg_color);
	imagerectangle($image, 0, 0, $width - 1, $height - 1, $border_color);
	
	$bar_width = $width/((count($data) * 2) + 1);
	for($i = 0; $i < count($data); $i++){
		imagefilledrectangle($image, ($i * $bar_width * 2) + $bar_width, 
			                 $height, ($i * $bar_width * 2) + ($bar_width *2), 
			                 $height - (($height/$max_value) * $data[$i][1]), $bar_color);
		imagestringup($image, 5, ($i * $bar_width * 2) + $bar_width, $height - 5, $data[$i][0], $text_color);
	}

	imagepng($image, $filename, 5);
	imagedestroy($image);
}

?>