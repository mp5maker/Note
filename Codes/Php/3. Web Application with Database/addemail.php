<?php 
$server_name = "localhost";
$user_name   = "root";
$password    = "";
$db_name     = "store";


if(!empty($_POST['submit'])):
	$connection = mysqli_connect($server_name, 
		                         $user_name, 
		                         $password, $db_name)
              or die("Could not connect to the server");
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $sql = "INSERT INTO email_list(first_name, 
                                   last_name, 
                                   email)
            VALUES('$first_name','$last_name','$email')";
    $result = mysqli_query($connection, $sql) 
              or die("Query Denied");
    echo nl2br("<h1>Confirmation Message</h1> \n");
    echo nl2br("<p>Name: $first_name $last_name</p>");
    echo nl2br("<p>Email: $email</p> \n");
    mysqli_close($connection);
endif;
?>