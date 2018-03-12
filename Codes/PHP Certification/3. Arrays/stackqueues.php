<?php 
/**
 * Stack (Last In, First Out)
 */
echo "Array Push";
$list = array("guitar", "amp", "cables");
array_push($list, "keyboard", "drums");
echo "<pre>";
var_dump($list);
echo "</pre>";
echo "============================";
echo "<br/>";

echo "Array Pop";
$last_in = array_pop($list);
echo "<pre>";
var_dump($last_in);
var_dump($list);
echo "</pre>";
echo "============================";
echo "<br/>";


/**
 * Queues (First in, First Out)
 */
echo "Array Shift";
$list = array("guitar", "amp", "cables");
array_shift($list);
echo "<pre>";
var_dump($list);
echo "</pre>";
echo "============================";
echo "<br/>";

echo "Array Unshift";
array_unshift($list, "keyboard", "drums");
echo "<pre>";
var_dump($last_in);
var_dump($list);
echo "</pre>";
echo "============================";
echo "<br/>";

?>