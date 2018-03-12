<?php 
/**
 * Encapsulation
 */
echo "Encapsulation</br>";
$describe = "toy";
$persons = ["John", "Dwayne", "Mary"];
echo "There are loads of {$describe}s in the store"."<br/>";
echo "Citation: {$persons[1]}[1984]<br/>";
echo nl2br("\n");

/**
 * Herodoc
 */
echo "Herodoc</br>";
$describe = "toy";
echo <<<BOOM
There are loads of {$describe}s in the store. 
BOOM;
echo nl2br("\n");
?>