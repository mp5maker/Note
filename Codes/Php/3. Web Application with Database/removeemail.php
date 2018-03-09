<?php 
	$server_name = "localhost";
	$user_name   = "root";
	$password    = "";
	$db_name     = "store";
   
    if(!empty($_POST)):
    	$email = $_POST['email'];
        $connection = mysqli_connect($server_name,
        	                         $user_name,
        	                         $password,
        	                         $db_name)
        or die("Could not connect to the server");
        $query = "DELETE FROM email_list where email = '$email'";
        mysqli_query($connection, $query) or
        die("Query Denied");
        echo nl2br("$email has been successfully removed\n");
        mysqli_close($connection);
    endif;
?>