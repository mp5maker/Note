<?php 
$a = [1, 2, 3];
$b = [1 => 2, 2 => 3, 0 => 1];
$c = ['a' => 1, 'b' => 2, 'c' => 3];

echo "<pre>";
var_dump($a == $b);
echo "<pre/>";

echo "<pre>";
var_dump($a === $b);
echo "<pre/>";

echo "<pre>";
var_dump($a == $c);
echo "<pre/>";

echo "<pre>";
var_dump($a === $c);
echo "<pre/>";

?>