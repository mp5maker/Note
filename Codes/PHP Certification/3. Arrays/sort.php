<?php 
//sort
echo "sort<br/>";
$groceries = ["a"=>'apple', "o" =>'orange', "l" => 'lemon'];
sort($groceries);

//It destroys the keys 
echo "<pre>";
var_dump($groceries);
echo "</pre>";

//asort
echo "asort<br/>";
$groceries = ["a"=>'apple', "o" =>'orange', "l" => 'lemon'];
asort($groceries);

//It maintains the keys
echo "<pre>";
var_dump($groceries);
echo "</pre>";

echo "===================================================";
echo "<br/>";


//rsort
echo "rsort<br/>";
$groceries = ["a"=>'apple', "o" =>'orange', "l" => 'lemon'];
rsort($groceries);

//It destroys the keys 
echo "<pre>";
var_dump($groceries);
echo "</pre>";

//arsort
echo "arsort<br/>";
$groceries = ["a"=>'apple', "o" =>'orange', "l" => 'lemon'];
arsort($groceries);

//It maintains the keys
echo "<pre>";
var_dump($groceries);
echo "</pre>";

echo "===================================================";
echo "<br/>";


//natsort
echo "natsort<br/>";
$groceries = ["a"=>'10T', "O" =>'20t', "l" => '30t', "f" => '40T'];
natsort($groceries);

echo "<pre>";
var_dump($groceries);
echo "</pre>";

//natcasesort
echo "natcasesort<br/>";
$groceries = ["a"=>'10T', "O" =>'20t', "l" => '30t', "f" => '40T'];
natcasesort($groceries);

echo "<pre>";
var_dump($groceries);
echo "</pre>";

echo "===================================================";
echo "<br/>";


//ksort
echo "ksort<br/>";
$groceries = ["a"=>'10T', "O" =>'20t', "l" => '30t', "1" => '40T'];
ksort($groceries);

echo "<pre>";
var_dump($groceries);
echo "</pre>";

//krsort
echo "krsort<br/>";
$groceries = ["a"=>'10T', "O" =>'20t', "l" => '30t', "1" => '40T'];
krsort($groceries);

echo "<pre>";
var_dump($groceries);
echo "</pre>";

echo "===================================================";
echo "<br/>";

//usort
echo "usort<br/>";
$items = ["three", "2two", "one", "two"];

usort($items, "organize");
function organize($left, $right){
	$diff = strlen($left) - strlen($right);
	if(!$diff):
		return strcmp($left, $right);
	endif;

	return $diff;
} 

echo "<pre>";
var_dump($items);
echo "</pre>";

echo "===================================================";
echo "<br/>";

//shuffle
echo "shuffle<br/>";
$items = ["a"=>'apple', "o" =>'orange', "l" => 'lemon'];

shuffle($items);
//It destroys the keys
echo "<pre>";
var_dump($items);
echo "</pre>";

echo "===================================================";
echo "<br/>";
?>