<?php
session_start();
if(isset($_SESSION['user']) && isset($_SESSION['user_pass'])):
   if(!empty($_SESSION['user']) && !empty($_SESSION['user_pass'])):
	    $_SESSION = array();
	    if(isset($_COOKIE[session_name()])):
	       setcookie(session_name(), '', time() - 3600, '/');
	    endif;
	    session_destroy();
		$home_url = $_SERVER['HTTP_REFERER'];
	    header("Location: ".$home_url);
    endif;      
endif;

