<?php 
session_start();

$error = array();
$clean = array();

function sanitize($data, $key){
    if(!empty($data)):
	    global $error;
	    $data = htmlentities(htmlspecialchars($data));

	    switch($key):
	    case "username":
	    return (ctype_alpha($data))? $data: "";
	    break;
	    
	    case "password":
	    return (ctype_alnum($data))? $data: "";
	    break;
	    
	    case "colors":
	    if(in_array($data, ["red","blue","green"])):
	    	return $data;
	    endif;
	    break;

	    default: throw new Exception("This is not a valid data");
	    endswitch;
	else:
		$empty_error = $key."_empty";
    	$error[$empty_error] = "$key cannot be empty";
	endif;
}
echo "HTTP USER AGENT <br/>";
var_dump($_POST['server']);
echo "<br/>";
var_dump($_SERVER['HTTP_USER_AGENT']);
echo "<br/>";
echo "<br/>";

echo "TOKEN <br/>";
var_dump($_POST['token']);
echo "<br/>";
var_dump($_SESSION['token']);
echo "<br/>";
echo "<br/>";


if(isset($_POST['submit']) && isset($_POST['token']) && isset($_SESSION['token'])):
	if(
	    ($_SESSION['token'] == $_POST['token']) 
		&& ($_POST['server'] == $_SERVER['HTTP_USER_AGENT'])
	   ):
		$clean["username"] = sanitize($_POST['username'], "username");
		$clean["password"] = sanitize($_POST['password'], "password");
		$clean["colors"]   = sanitize($_POST['colors'], "colors");
		echo "<pre>";
			var_dump($clean["username"]);
		    echo "<br/>";
			var_dump($clean["password"]);
		    echo "<br/>";
			var_dump($clean["colors"]);
		    echo "<br/>";
		echo "</pre>";
	endif;
endif;
?>