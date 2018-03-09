<?php 	
require_once("common/database.php");

if(!isset($_COOKIE['user_id'])):
	if(isset($_POST['submit'])):
		$connection = mysqli_connect($server_name, $user_name, $password, $db_name)
		              or die ("Server Denied");
		$user_username = mysqli_real_escape_string($connection, trim($_POST['username']));
		$user_password = mysqli_real_escape_string($connection, trim($_POST['password']));
		if(!empty($user_username) && !empty($user_password)):
			$query = "SELECT user_id, username FROM mismatch_user WHERE username = '$user_username' AND password = SHA('$user_password')";
			$data = mysqli_query($connection, $query) or die ("Query Denied");
			if(mysqli_num_rows($data) == 1):
					$row = mysqli_fetch_array($data);
				    setcookie('user_id',$row['user_id'],time() + (86400 * 30), "/");
				    setcookie('username',$row['username'],time() + (86400 * 30), "/");
				    $home_url = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/home.php"; 
				    echo "Successfully Logged In";
				    header("Location: ".$home_url);
			endif;
 	    endif;
    endif;
endif;

if(empty($_COOKIE['user_id'])){
	echo "<!doctype html>";
	echo " <html>";
	echo " 	<head>";
	echo " 		<title>Log in</title>";
	echo " 		<meta charset = 'UTF-8'/>";
	echo " 	</head>";
	echo " 	<body>";
	echo " 	    <h3> Log In </h3>";
	echo " 		<form method = 'post' action = ''>";
	echo "          <label for = 'username'>Username</label><br/>";
	echo "          <input type = 'text' name = 'username'><br/>";
	echo "          <label for = 'password'> Password </label><br/>";
	echo "          <input type = 'password' name = 'password'/><br/>";
	echo "          <input type = 'submit' name = 'submit' value = 'Confirm'/>";
	echo " 		</form>";
	echo " 	</body>";
	echo " </html>";
}
else{
	echo "You are logged in as ".$_COOKIE['username'];
}
?>