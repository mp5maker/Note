<?php 
//Works in Linux Only
$a = `ls -l`;
echo $a;

//Works in windows (To show what the command window will say)
system("python 2>&1",$output) ;
?>