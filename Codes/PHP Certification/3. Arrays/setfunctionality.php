<?php
echo "array diff<br/>";
$collection = [299, 23, 15, 90];
$collection2 = [23, 15, 100, 70];

echo "<pre>";
var_dump(array_diff($collection, $collection2));
echo "</pre>";
echo "=====================================<br/>";

echo "array intersect<br/>";
$collection = [299, 23, 15, 90];
$collection2 = [23, 15, 100, 70];

echo "<pre>";
var_dump(array_intersect($collection, $collection2));
echo "</pre>";
?>