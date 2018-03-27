<?php 
$names = ['Sam', 'Bob', 'Peter'];

if(isset($_REQUEST)){
	if(isset($_REQUEST['username'])):
		if(in_array($_REQUEST['username'], $names)):
			echo "usernameexist";
		endif;
	endif;
	if(isset($_REQUEST['submit'])):
		echo "Username: ".$_REQUEST['user']. " Pass: ".$_REQUEST['pass'];
	endif;
}
?>