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
	endif;
?>