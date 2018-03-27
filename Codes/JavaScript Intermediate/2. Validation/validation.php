<?php 
$names = ['Sam', 'Bob', 'Peter'];

if(isset($_REQUEST)){
	if(in_array($_REQUEST['username'], $names)){
		echo "usernameexist";
	}
}
?>