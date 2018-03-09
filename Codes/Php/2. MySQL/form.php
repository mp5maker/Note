<?php
echo '<!doctype html>';
echo ' <html>';
echo '	<head>';
echo '	    <meta charset = "UTF-8"/>';
echo '		<title> Simple Form </title>';
echo '	</head>';
echo ' 	<body>';
echo '		<p> Please fill out the form </p>';
echo '		<form method = "post" action = "';
echo                       $_SERVER['PHP_SELF']."\">";
echo '		<label for = "firstname"> First Name: </label>';
echo '		<input type = "text" id = "filename" name = "firstname"/><br/>';
echo '		<label for = "lastname"> Last Name: </label>';
echo '		<input type = "text" id = "lastname" name = "lastname"/><br/>';
echo '		<label for = "email"> Email: </label>';
echo '		<input type = "email" id = "email" name = "email"/><br/>';
echo '		<label for =  "gender">Gender: </label>';
echo ' 			Male <input type = "radio" id ="gender" name = "gender" value = "male">';
echo ' 			Female <input type = "radio" id = "gender" name = "gender" value = "female"><br/>';
echo '        <label for = "description"> Description: </label>';
echo '        <textarea name = "description"> Max word 500 words </textarea><br/>';
echo '        <input type = "submit" value = "Submit"  name = "submit"/>';
echo '        </form>';
echo '  	</body>';
echo ' </html>';
?>

<?php
if(!empty($_POST["submit"])):
	$firstname   =  $_POST["firstname"];
	$lastname    =  $_POST["lastname"];
	$email       =  $_POST["email"];
	$gender	     =  $_POST["gender"];
	$description =  $_POST["description"];
	echo "First Name: ".$firstname."<br/>";
	echo "Last Name: ".$lastname."<br/>";
	echo "Email: ".$email."<br/>";
	echo "Gender: ".$gender."<br/>";
	echo "Description: ".$description."<br/>";
    

    $server_name = "localhost";
    $user_name   = "root";
    $password    = "";
    $database_name = "form_table";
    $connection  = mysqli_connect($server_name, $user_name, $password, $database_name)
                   or die("Could not connect to the server");
    $query = "INSERT INTO form(first_name, last_name, email, gender, description)
                     VALUES('$firstname','$lastname', '$email', '$gender', '$description')";
    $result = mysqli_query($connection, $query) or die("Error Querying database");
    mysqli_close($connection);               
endif;
?>

