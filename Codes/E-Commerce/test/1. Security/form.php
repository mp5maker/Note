<?php 
session_start();
$token = md5(uniqid(rand(), true));
$agent = $_SERVER['HTTP_USER_AGENT'];

$_SESSION['token'] = $token;
$_SESSION['agent'] = $agent;
setcookie('token', $token, time() + (86400 * 30), "/");
setcookie('agent', $agent, time() + (86400 * 30), "/");

echo "<!DOCTYPE html>";
echo "	<html lang = 'en'>";
echo "		<head>";
echo "			<title> Form </title>";
echo "			<meta charset = 'UTF-8'/>";
echo "			<meta name = 'viewport' content = 'width=device-width; initial-scale=1'/>";
echo "		</head>";
echo "		<body>";
echo "			<form method = 'post' action = 'handleForm.php'>";
echo "				<input type = 'hidden' name = 'token' value = '".$token."'/>";
echo "				<input type = 'hidden' name = 'agent' value = '".$agent."'/>";
echo "				<label for = 'data'> Data </label><br/>";
echo "				<input type = 'text' name = 'data' /><br/><br/>";
echo "				<input type = 'submit' name = 'submit' value = 'Confirm'/>";
echo "			</form>";
echo "		</body>";
echo "	</html>";
?>



