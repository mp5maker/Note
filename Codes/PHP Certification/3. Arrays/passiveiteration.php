<?php
$employees = ["Peter","James"];

$description[] = ["Spiderman", "Photographer"];
$description[] = ["Guitar Player", "Metallica"];
$combine = array_combine($employees, $description);

function setCase(&$value, &$key){
	$value = strtoupper($value);
}

array_walk_recursive($combine, "setCase");
echo "<pre>";
var_dump($combine);
echo "</pre>";
?>