<?php 
$file_path = "images/chips.png";
if(is_file($file_path) && filesize($file_path) > 0):
	echo "It is a file";
endif;
?>