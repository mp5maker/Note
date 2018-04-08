<?php
require($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/config.inc.php');
$page_title = "Forgot Your Password?";
include($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/header.php');
require(MYSQL);
require($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/form_functions.inc.php');

$pass_errors['email'] = '';
$recovery_message = false;
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['recovery'])):
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):
		$e = mysqli_real_escape_string($dbc, $_POST['email']);
		$query = "SELECT id FROM users WHERE email = '$e'";
		$result = mysqli_query($dbc, $query);
		if(mysqli_num_rows($result) == 1):
			$row = mysqli_fetch_array($result, MYSQLI_NUM);
			$user_id = $row[0];
			$e_recovery = 0;
			foreach($pass_errors as $pass_error):
				if($pass_error != ''):
					$e_recover += 1;
				endif;
			endforeach; 
			if($e_recovery == 0):
				$letters = 5;
				$p = '';
				for($i = 0; $i < $letters; $i++):
					$p .= chr(rand(97,122));
				endfor;
				$p .= "1!";
				
				$pass_hash = password_hash($p, PASSWORD_DEFAULT);
				$query = "UPDATE users SET pass = '$pass_hash' WHERE id = '$user_id'";
				$result = mysqli_query($dbc, $query);
				if(mysqli_affected_rows($dbc) == 1):
					 $from = "khan.photon@gmail.com";
			    	 $to = $e;
			    	 $subject = "Password Recovery: Temporary Password";
			    	 $message = "Your password to log into CODE BREAK has been temporarily changed to $p Please log in using that password and this email address.";
			    	 $headers = "From:" . $from;
				    if(mail($to,$subject,$message, $headers)):
				        echo "Email sent.";
				    else: 
				        echo "Failed to send the email.";
				    endif; 
					$recovery_message = true;
				endif;
			endif;
		else: 
			$pass_errors['email'] = "Your email is not registered!";
		endif;
	else:
		$pass_errors['email'] = "Invalid Email Address!";
	endif;
endif;

if($recovery_message):
	$r_message = "<h3 class = 'ml-2 mb-0'> Your password has been changed. </h3>
					<p class = 'ml-2 mb-0'> You will receive the new, temporary password via email. </p>
					<p class = 'ml-2 mb-0'> Once you have logged in with this new password</p>
					<p class = 'ml-2 mb-0 text-danger'> You may change it by clicking on the 'Change Password'";
endif;

$body = "
		<div>
			<h3 class = 'pl-2'> Reset Your Password </h3>
			<p class = 'ml-2'>Enter your email address below to reset your password.</p>
			<form action = '".str_replace('_','-',basename($_SERVER['PHP_SELF'],'.php'))."' method = 'post' class =  'ml-2'>
				<div class = 'form-inline form-group'> 
					<label for = 'email'> Email &nbsp;</label>
					<input type = 'text' name = 'email' id = 'email' class = 'form-control'/>
					<input type = 'submit' class = 'btn btn-success' name = 'recovery' value = 'Confirm'/>
				</div>
				<span class = 'text-danger'>".$pass_errors['email']."</span> &nbsp;
			</form>";
$body .= isset($r_message)? $r_message : '';
$body .= 	"</div>";
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/body.php");
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/footer.php");
?>