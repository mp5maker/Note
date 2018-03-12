<?php 
//Modify the values of the all the elements
$values = array("100", "200", "300");
foreach($values as $key => &$value):
    $value++;
endforeach;

echo "<pre>";
var_dump($values);
echo "</pre>";

//Modify all the elements except the last one
$values = array("100", "200", "300");
foreach($values as $key => &$value):
endforeach;

//Loop Result 0 --> 100, 1--> 200, 2 --> 300
echo "<pre>";
var_dump($values);
echo "</pre>";



foreach($values as $key => $value):
endforeach;

//Loop Result 2 --> 100, 2 --> 200, 2 --> 200
echo "<pre>";
var_dump($values);
echo "</pre>";

?>
