<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/E-Commerce2/includes/config.php');
if(isset($_SESSION['user_admin']) && isset($_SESSION['user_admin_pass'])):
   if(!empty($_SESSION['user_admin']) && !empty($_SESSION['user_admin_pass'])):
	    $_SESSION = array();
	    if(isset($_COOKIE[session_name()])):
	       setcookie(session_name(), '', time() - 3600, '/');
	    endif;
	    session_destroy();
		$home_url = $_SERVER['HTTP_REFERER'];
		header("Location: ".$home_url);
    endif; 
else:     
	$home_url = $_SERVER['HTTP_REFERER'];
	header("Location: ".$home_url);
endif;
