<?php 
$image_list = array();
foreach(scandir($_SERVER['DOCUMENT_ROOT']."/cafe/img/") as $file):
	if($file == "." || $file == ".." ):
	else:
		$image_list[$file] = $file;
	endif;
endforeach;
