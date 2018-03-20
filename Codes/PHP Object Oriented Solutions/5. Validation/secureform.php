<?php 
session_start();
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;
setcookie('token', $token);
$host = $_SERVER['HTTP_USER_AGENT'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Simple Form </title>
		<meta charset = "UTF-8">
	</head>
	<body>
		<form enctype = "multipart/form-data" method = "post" action = "validator.php">
			<input type = "hidden" name = "token" value = "<?php echo $token; ?>">
			<input type = "hidden" name = "host" value = "<?php echo $host; ?>">
			
			<label for = "fullname"> Full Name </label><br/>
			<input type = "text" name = "fullname"/><br/><br/>

			<label for = "email"> Email </label><br/>
			<input type = "text" name = "email"/><br/><br/>

			<label for = "age"> Age </label><br/>
			<input type = "text" name = "age"><br/><br/>

			<label for = "event_name"> Event </label><br/>
			Festival<input type = "radio" name = "event_name" value = "festival"/>
			Concert<input type = "radio" name = "event_name" value = "concert"/>
			Seminar<input type = "radio" name = "event_name" value = "seminar"/><br/><br/>

			<label for = "vehicle"> Vehicle </label><br/>
			<select name = "vehicle">
				<option value = "car">Car</option>
				<option value = "bus">Bus</option>
				<option value = "motorcyle">Motorcycle</option>
			</select><br/><br/>

			<label for = "food"> Snacks </label><br/>
			Hot Dog<input type = "checkbox" name = "food" value = "hotdog"/>
			Burger<input type = "checkbox" name = "food" value = "hotdog"/>
			Pizza<input type = "checkbox" name = "food" value = "hotdog"/><br/><br/>

			<label for = "description"> Description </label><br/>
			<textarea name = "description"></textarea><br/><br/>

			<label for = "image"> Image Upload </label><br/>
			<input type = "file" name = "image"><br/><br/>
		    <!-- <input type = "hidden" name = "MAX_FILE_SIZE" value = "32768"/> -->

			<label for = "captcha"> Captcha </label><br/>
			<img src = "captcha.php" alt = "Captacha Image"/><br/>
			<input type = "text" name = "captcha"/><br/><br/>

			<input type = "submit" name = "submit" value = "Submit"/>
		</form>
	</body>
</html>