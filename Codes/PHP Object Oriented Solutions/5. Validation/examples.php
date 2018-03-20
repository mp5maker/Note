<?php 
/**
 * Checking whether the variable exists or not.
 */
if(filter_has_var(INPUT_POST, "fullname")){
	echo nl2br($_POST['fullname']." Got It!\n");
}
else{
	echo nl2br("Couldn't find the required data\n");
}

/**
 * Checking the filter list
 */
echo "<pre>";
print_r(filter_list());
echo "</pre>";

/**
 * Representing one of th supppoted filters.
 */
echo "<pre>";
echo filter_id('int');
echo "</pre>";

/**
 * FILTER_VALIDATE_INT  
 */
echo "<pre>";
$filtered = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT);
var_dump($filtered);
echo "</pre>";

/**
 * FILTER_VALIDATE_FLOAT  
 */
echo "<pre>";
$filtered = filter_input(INPUT_POST, "age", FILTER_VALIDATE_FLOAT, "decimal");
var_dump($filtered);
echo "</pre>";

/**
 * Filter using filter_id 
 */
echo "<pre>";
$filtered = filter_input(INPUT_POST, "age", filter_id('float'));
var_dump($filtered);
echo "</pre>";

?>