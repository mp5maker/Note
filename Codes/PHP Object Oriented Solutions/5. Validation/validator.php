<?php 
session_start();
echo "<pre>";
var_dump($_POST);
echo $_SERVER['HTTP_USER_AGENT']."<br/>";
echo $_COOKIE['token']."<br/>";
echo $_SESSION['token']."<br/>";
echo "</pre>";

if(isset($_POST)):
	$tmp_name = $_FILES['image']['tmp_name'];
	$file_name = $_FILES['image']['name'];
	move_uploaded_file($tmp_name, "images/{$file_name}");
endif;

?>