<?php
session_start();
if(!isset($_SESSION['user_id']) || !isset($_SESSION['username'])):
   if(isset($_COOKIE['user_id']) && isset($_COOKIE['username'])):
         $_SESSION['user_id']  = $_COOKIE['user_id'];
         $_SESSION['username'] = $_COOKIE['username'];
   endif;
endif;
?>