<?php
session_start(); 
if(
  isset($_SESSION['username']) && !empty($_SESSION['username']) &&
    isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])
  ):
    $_SESSION = array();
    if(isset($_COOKIE[session_name()])):
       setcookie(session_name(), '', time() - 3600, '/');
    endif;
    session_destroy();      
endif;
if(
  isset($_COOKIE['username']) && !empty($_COOKIE['username']) &&
    isset($_COOKIE['user_id']) && !empty($_COOKIE['user_id'])
  ):
    setcookie('username',' ', time() - 3600, "/");
    setcookie('user_id',' ', time() - 3600, "/");
    $home_url = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/home.php";
    header("Location: ".$home_url);
endif;

?>