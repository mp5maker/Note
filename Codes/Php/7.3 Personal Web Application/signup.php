<?php 
require_once("common/database.php");
require_once("common/constants.php");
$connection = mysqli_connect($server_name, $user_name, $password, $db_name)
              or die ("Server Denied");
$showform = TRUE;

if(isset($_POST['submit'])):
	if(
		!empty($_POST['username'])   &&
	    !empty($_POST['password'])   &&
	    !empty($_POST['first_name']) &&
	    !empty($_POST['last_name'])  &&
	    !empty($_POST['gender'])     &&
	    !empty($_POST['date'])       &&
	    !empty($_POST['city'])		 &&
	    !empty($_POST['state'])      &&
	    !empty($_FILES['picture'])   &&
	    $_POST['password'] == $_POST['password_two']
	   ):
		$showform = FALSE;
    	$username = isset($_POST['username'])? mysqli_real_escape_string($connection, trim($_POST['username'])): NULL;
    	$password = isset($_POST['password'])? mysqli_real_escape_string($connection, trim($_POST['password'])): NULL;
    	$first_name = isset($_POST['first_name'])? mysqli_real_escape_string($connection, trim($_POST['first_name'])): NULL;
    	$last_name = isset($_POST['last_name'])? mysqli_real_escape_string($connection, trim($_POST['last_name'])): NULL;
    	$gender = isset($_POST['gender'])? mysqli_real_escape_string($connection, trim($_POST['gender'])): NULL;
    	$date = isset($_POST['date'])? mysqli_real_escape_string($connection, trim($_POST['date'])): NULL;
    	$city = isset($_POST['city'])? mysqli_real_escape_string($connection, trim($_POST['city'])): NULL;
    	$state = isset($_POST['state'])? mysqli_real_escape_string($connection, trim($_POST['state'])): NULL;
    	$picture = isset($_FILES['picture'])? mysqli_real_escape_string($connection, trim($_FILES['picture']['name'])): NULL;
    	$query = "INSERT INTO mismatch_user(username, password, join_date, first_name, last_name, gender, birth_date, city, state, picture)
    	          VALUES('$username', SHA('$password'), NOW(), '$first_name', '$last_name', '$gender', '$date', '$city', '$state', '$picture')";
    	mysqli_query($connection, $query);
    	$destination = UPLOAD_PATH.$_FILES['picture']['name'];
    	move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
    	echo "User Successfully Added";

	endif;
endif;

if($showform):
	echo '<!doctype html>';
	echo ' <html>';
	echo ' 	<head>';
	echo ' 	   <title> Add Users </title>';
	echo ' 	   <meta charset = "UTF-8"/>';
	echo ' 	</head>';
	echo ' 	<body>';
	echo " <form enctype = 'multipart/form-data' method = 'post' action = '".$_SERVER['PHP_SELF']."'>";
	echo '   <label for = "username">Username</label><br/>';
	echo '   <input type = "text" name = "username"/><br/>';
	
	echo '   <label for = "password">Password</label><br/>';
	echo '   <input type = "password" name = "password"/><br/>';
	
	echo '   <label for = "password_two">Retype Password</label><br/>';
	echo '   <input type = "password" name = "password_two"/><br/>';
	
	echo '   <label for = "first_name">First Name</label><br/>';
	echo '   <input type = "text" name = "first_name"/><br/>';
	
	echo '   <label for = "last_name">Last Name</label><br/>';
	echo '   <input type = "text" name = "last_name"/><br/>';
	
	echo '   <label for = "gender">Gender</label><br/>';
	echo '    Male<input type = "radio" name = "gender" value = "male"/>';
	echo '    Female<input type = "radio" name = "gender" value = "female"/><br/>';
	
	echo '   <label for = "date">Date</label><br/>';
	echo '   <input type = "date" name = "date"/><br/>';
	
	echo '   <label for = "city">City</label><br/>';
	echo '   <input type = "text" name = "city"/><br/>';
	
	echo '   <label for = "state">State</label><br/>';
	echo '   <input type = "text" name = "state"/><br/>';
	
	echo '   <label for = "picture">Picture</label><br/>';
	echo '   <input type = "file" name = "picture"/><br/>';
	
	echo '   <input type = "submit" name = "submit" value = "Submit"/><br/>';
	echo ' </form>';
	echo ' 	</body>';
	echo ' </html>';
	require_once("templates/pagefooter.php");
endif;	

?>