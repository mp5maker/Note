<?php 
$name        = "Allen Smith";
$age         = "21";
$occupation = "Engineer";

echo '$name is $age-years-old. \r\n He is an \"$occupation.\"';

echo "<br/><br/>";

echo nl2br("$name is $age-years-old. \n He is an \"$occupation.\"\n\n");
echo "\\ \"";
?>