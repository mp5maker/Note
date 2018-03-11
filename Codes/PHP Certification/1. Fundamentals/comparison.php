<?php 
//String to String Comparison
$left = "ABC";
$right = "ABD";

// A = 065,  B = 066, C = 067, D = 068
 if($left > $right):
// 065 066 067    >  065 066 068
    echo "TRUE"."<br/>";
 else:
 	echo "FALSE"."<br/>";
 endif; 

//Lower case and Upper case comparison
if("apple" > "Apple"):
// 097       065
  echo "TRUE"."<br/>";
else:
  echo "FALSE"."<br/>";
endif; 
?>