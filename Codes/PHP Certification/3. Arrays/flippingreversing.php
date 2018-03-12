<?php 
$a = ["Neville" => "Smart", "Harry" => "Intelligent", "Ron" => "Dumb"];

// Smart --> Neville, Harry --> Intelligent, Dumb --> Ron
// Key becomes the value and the value becomes the key
echo "<pre>";
var_dump(array_flip($a));
echo "</pre>";

$a = ["Neville" => "Smart", "10" => "Intelligent", "Ron" => "Dumb"];
//Reversing the order
echo "<pre>";
var_dump(array_reverse($a));
echo "</pre>";
?>