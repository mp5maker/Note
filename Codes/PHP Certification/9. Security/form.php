<?php
session_start();
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;
$server = $_SERVER['HTTP_USER_AGENT'];

?>
<!DOCTYPE html>
<html>
	<head>
		<title> Security Form </title>
		<meta charset = "UTF-8"/>
	</head>
	<body>
		<form method = "post" action = "process.php"/>
			 <input type = "hidden" name = "token" value = "<?php echo $token;?>"/>
			 <input type = "hidden" name = "server" value = "<?php echo $server;?>"/>
			 <label for = "username"> Username</label><br/>
			 <input text = "text" name = "username" maxlength = "30"/><br/><br/>

			 <label for = "password"> Password </label><br/>
			 <input text = "password" name = "password" maxlength = "15"><br/><br/>
			 
			 <label for = "colors"> Colors </label>
			 <select name = "colors">
			 	<option value = "red"> Red </option>
			 	<option value = "blue"> Blue </option>
			 	<option value = "green"> Green </option>
			 </select><br/><br/>
		 	<input type = "submit" name = "submit" value = "Confirm"/>
		</form>
	</body>
</html>

