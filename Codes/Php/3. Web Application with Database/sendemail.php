<?php 
if(!empty($_POST['submit'])):
	$from = "khan.photon@gmail.com";
    $subject = $_POST['subject'];
    $body_of_email = $_POST['body_of_email'];

    $server_name = "localhost";
	$user_name   = "root";
	$password    = "";
	$db_name     = "store";

	$connection = mysqli_connect($server_name,
		                         $user_name,
		                         $password,
		                         $db_name)
	or die("Could connect to the server");

    $query = "SELECT * FROM email_list";
	$result = mysqli_query($connection, $query)
	        or die("Query Denied");
	while($row = mysqli_fetch_array($result)){
     	  $to = $row['email'];
          mail($to, $subject, $body_of_email, "From: $from");
	}
    mysqli_close($connection);
endif;
?>
