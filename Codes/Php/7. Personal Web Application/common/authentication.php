<?php 
require_once("database.php");
if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])):
	header('HTTP/1.1 Unauthorized');
	header('WWW-Authenticate: Basic realm="Mismatch"');
	exit('<h3> Mismatch </h3> Sorry, you must enter your username and 
		       this password to log in and access');
endif;

$connection = mysqli_connect($server_name, $user_name, $password, $db_name)
              or die ("Server Denied");
$user_username = mysqli_real_escape_string($connection, trim($_SERVER['PHP_AUTH_USER']));
$user_password = mysqli_real_escape_string($connection, trim($_SERVER['PHP_AUTH_PW']));

$query = "SELECT user_id, username FROM mismatch_user WHERE username = '$user_username' AND password = SHA('$user_password')";
$data = mysqli_query($connection, $query) or die ("Query Denied");
if(mysqli_num_rows($data) == 1){
		$row = mysqli_fetch_array($data);
	    $user_id = $row['user_id'];
	    $username = $row['username'];
     }
else{ 
	header('HTTP/1.1 Unauthorized');
    header('WWW-Authenticate: Basic realm="Mismatch"');
    exit('<h3> Mismatch </h3> Sorry, you must enter your username and 
		       this password to log in and access');
   }
?>