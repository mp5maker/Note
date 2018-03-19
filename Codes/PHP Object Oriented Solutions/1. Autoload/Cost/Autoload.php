<?php 
function __autoload($class){
	$array = explode("_", $class);
	$path  = implode(DIRECTORY_SEPARATOR, $array);
	require_once("{$path}.php");
}


$tools = new Tools();
$transport = new Transport();
$groceries_apple = new Groceries_Apple();
$groceries_apple = new Groceries_Orange();

// function __autoload($class){
// 	$array = explode("_", $class);
// 	$path  = "C:\\xampp\\htdocs\\Education\\PHP Object Oriented Solutions\\1. Autoload\\".implode(DIRECTORY_SEPARATOR, $array);
// 	require_once("{$path}.php");
// }

// $todolist = new ToDoList();
?>

