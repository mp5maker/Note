<?php 

$server_name = "localhost";
$user_name   = "root";
$password    = "";
$db_name     = "form_table";

$connection =  mysqli_connect($server_name, $user_name, $password, $db_name)
               or die("Could not connect to the database");
$query  = "SELECT * FROM form";
$result = mysqli_query($connection, $query)
          or die("Query not working");

while($row = mysqli_fetch_array($result)){
	$id          = $row['id'];
	$first_name  = $row['first_name'];
	$last_name   = $row['last_name'];
	$email       = $row['email'];
	$gender      = $row['gender'];
	$description = $row['description'];

	echo nl2br("Name: $first_name $last_name\n");
	echo nl2br("Email: $email\n");
	echo nl2br("Gender: $gender\n");
	echo nl2br("Description: $gender\n\n");
}

mysqli_close($connection);
?>