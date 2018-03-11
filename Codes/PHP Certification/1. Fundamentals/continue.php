<?php 
//Continue
echo nl2br("Continue\n");
$total = 4;
for($i = 1; $i <= $total; $i++):
	if($i == 2):
		continue;
	endif;
	echo $i.PHP_EOL;
endfor;

//Break
echo nl2br("\n");
echo nl2br("Break\n");
$total = 4;
for($i = 1; $i <= $total; $i++):
	if($i == 2):
		break;
	endif;
	echo nl2br("$i\n");
endfor;
?>