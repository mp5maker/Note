<?php 
require($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/config.inc.php');
$page_title = "Change your password";
include($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/header.php');
require(MYSQL);
require($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/form_functions.inc.php');

if(isset($_SESSION['user_id'])):
	$change_errors['pass'] = '';
	$change_errors['pass1'] = '';
	$change_errors['pass2'] = '';
	$password_change = false;

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['changepass'])):
		if(empty($_POST['pass'])):
			$change_errors['pass'] = "Field cannot be empty";
		endif;

		if(empty($_POST['pass1']) || empty($_POST['pass2'])):
			if(empty($_POST['pass1'])):
				$change_errors['pass1'] = "Field cannot be empty";
			endif;
			if(empty($_POST['pass2'])):
				$change_errors['pass2'] = "Field cannot be empty";
			endif;
		else:
			if($_POST['pass1'] != $_POST['pass2']):
				$change_errors['pass2'] = "Passwords do not match";
			else:
				$pattern = "/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[\_!-\.@#%]).{6,16}$/";
				if(!preg_match($pattern, $_POST['pass1'])):
					$change_errors['pass2'] = "Minimum 6 characters, Needs to have least 1 number and 1 special character";
				else:
					$p = password_hash(mysqli_real_escape_string($dbc, $_POST['pass1']), PASSWORD_DEFAULT);
				endif;
			endif;
		endif;

		$change = 0;
		foreach($change_errors as $change_error):
			if($change_error != ''):
				$change += 1;
			endif;
		endforeach;

		if($change == 0):
			$user_id = $_SESSION['user_id'];
			$query = "UPDATE users SET pass = '$p' WHERE id = '$user_id'";
			$result = mysqli_query($dbc, $query);
			if(mysqli_affected_rows($dbc) == 1):
				$password_change = true;
			endif;
		endif;
	endif;
	$body = "
			<div>
				<h3 class = 'pl-2'> Change Your Password </h3>
				<p class = 'ml-2'>Use the form below to change your password</p>
				<form action = '".str_replace('_','-',basename($_SERVER['PHP_SELF'], '.php'))."' method = 'post' class =  'ml-2'>
					<div class = 'form-inline form-group'> 
						<label for = 'pass'> Current Password &nbsp;</label>
						<input type = 'password' name = 'pass' id = 'pass' class = 'form-control'/>
						<span class = 'text-danger'>".$change_errors['pass']."</span> &nbsp;
					</div>
					<div class = 'form-inline form-group'> 
						<label for = 'pass1'> New Password &nbsp;</label>
						<input type = 'password' name = 'pass1' id = 'pass1' class = 'form-control'/>
						<span class = 'text-danger'>".$change_errors['pass1']."</span> &nbsp;
					</div>
					<div class = 'form-inline form-group'> 
						<label for = 'pass2'> Confirm New Password &nbsp;</label>
						<input type = 'password' name = 'pass2' id = 'pass2' class = 'form-control'/>
						<span class = 'text-danger'>".$change_errors['pass2']."</span> &nbsp;
					</div>
						<input type = 'submit' class = 'btn btn-success' name = 'changepass' value = 'Confirm'/>
				</form>";
	if($password_change):
		$body .= "<span class = 'text-success'>Password Changed Successfully</span>";
	endif;
	$body .= 	"</div>";
else:
	echo "<h1 class = 'text-danger'> You are not allowed to have access to this page </h1>";
	echo "<meta http-equiv='refresh' content='1;url=/E-Commerce'/>";
endif;
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/body.php");
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/footer.php");
