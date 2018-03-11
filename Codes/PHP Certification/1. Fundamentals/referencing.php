<?php 
//Referencing variables
$a = 10;
echo nl2br("Before Changing: $a\n");

$b = &$a;
$b = 20;
echo nl2br("After Changing: $a\n");



//Referencing variables through function
$ready_to_change = 4;
echo nl2br("Before Changing: $ready_to_change\n");

function change_me(&$let_me_change){
   $let_me_change = 6;
}

change_me($ready_to_change);
echo "After Changing: $ready_to_change";
?>