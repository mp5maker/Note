<?php 
$file = fopen("http://google.com", "r");
$page = "";

if($file):
	while ($row = fread($file, 10000)):
		$page .= $row;
	endwhile;
	echo $page;
else: 
	throw new Exception("Unable to open connection to www.google.com");
endif;
?>