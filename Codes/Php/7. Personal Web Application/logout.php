<?php 
if(
	isset($_COOKIE['username']) && !empty($_COOKIE['username']) &&
    isset($_COOKIE['user_id']) && !empty($_COOKIE['user_id'])
  ):
 	echo "<p>".$_COOKIE['username']." Successfully logged out</p>";
    setcookie('username',' ', time() - 3600, "/");
    setcookie('user_id',' ', time() - 3600, "/");
 	$home_url = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/home.php";
    header("Location: ".$home_url);
endif;
?>