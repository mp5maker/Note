<?php 
$collection_one =  [1, 2, 3];
$collection_two =  ["a" => 1, "b" => 2, "c" => 3];


/**
 * Therefore the addition of $collection_one + $collection_one:
 * 0 --> 1, 1 --> 2, 2 --> 3
 */
echo "<pre>";
var_dump($collection_one + $collection_one);
echo "</pre>";


/**
 * Therefore the addition of $collection_one + $collection_two:
 * 0 --> 1, 1 --> 2, 2 --> 3, a --> 1, b --> 2, c --> 3
 */
echo "<pre>";
var_dump($collection_one + $collection_two);
echo "</pre>";

/**
 * Therefore the addition of $collection_one + $collection_two:
 * 0 --> 1, 1 --> 2, 2 --> 3, a --> 1 
 */
$collection_one =  [1, 2, 3];
$collection_two = ['a' => 1, 2 , 3];
echo "<pre>";
var_dump($collection_one + $collection_two);
echo "</pre>";
?>
