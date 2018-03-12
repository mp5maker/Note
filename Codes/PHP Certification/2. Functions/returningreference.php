<?php

$number = 10;

function &getValue(){
   // global $number;
   // We cannot return return global $number;
   // return $number;
   return $GLOBALS['number'];
}

$collect =& getValue();
--$collect;

echo nl2br("Returning reference: $number");
?>