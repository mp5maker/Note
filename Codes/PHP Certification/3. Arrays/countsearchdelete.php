<?php 
$collection = ["Sam" => "Fat", "Peter" => "thin",  "Robert" => NULL];
echo nl2br(count($collection)."\n");

echo "<pre>";
var_dump(is_array($collection));
echo "</pre>";

echo "<pre>";
var_dump(isset($collection['Robert']));
echo "</pre>";

echo "<pre>";
var_dump(array_key_exists("Robert", $collection));
echo "</pre>";

unset($collection['Peter']);
echo "<pre>";
var_dump($collection);
echo "</pre>";
?>