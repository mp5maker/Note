<?php 
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ecommerce1');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)
	   or die ("Server Denied");
mysqli_set_charset($dbc, 'utf8');

function escape_data($data){
	global $dbc;
	return mysqli_real_escape_string(trim($data), $dbc);
}

