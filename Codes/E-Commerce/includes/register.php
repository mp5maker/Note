<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/config.inc.php');
$page_title = "Register";
require_once($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/header.php');
require(MYSQL);
require($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/form_functions.inc.php');

$reg_errors['first_name'] = '';
$reg_errors['last_name'] = '';
$reg_errors['username'] = '';
$reg_errors['email'] = '';
$reg_errors['pass1'] = '';
$reg_errors['pass2'] = '';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registration'])):
	if(empty($_POST['first_name'])):
		$reg_errors['first_name'] = "Field cannot be empty";
	else:
		$pattern = "/^[a-zA-Z\'.-]{2,20}$/";
		if(!preg_match($pattern, $_POST['first_name'])):
			$reg_errors['first_name'] = "Invalid First Name";
		else:
			$fn = mysqli_real_escape_string($dbc, $_POST['first_name']);
		endif;
	endif;	
	if(empty($_POST['last_name'])):
		$reg_errors['last_name'] = "Field cannot be empty";
	else:
		$pattern = "/^[a-zA-Z\'.-]{2,40}$/";
		if(!preg_match($pattern, $_POST['last_name'])):
			$reg_errors['last_name'] = "Invalid Last Name";
		else:
			$ln = mysqli_real_escape_string($dbc, $_POST['last_name']);
		endif;
	endif;	
	if(empty($_POST['username'])):
		$reg_errors['username'] = "Field cannot be empty";
	else:
		$pattern = "/^[a-zA-Z\'.-\_0-9]{8,30}$/";
		if(!preg_match($pattern, $_POST['username'])):
			$reg_errors['username'] = "Minimum 8 characters, avoid @,!,#,+,?";
		else:
			$u = mysqli_real_escape_string($dbc, $_POST['username']);
		endif;
	endif;	
	if(empty($_POST['email'])):
		$reg_errors['email'] = "Field cannot be empty";
	else:
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):
			$reg_errors['email'] = "Invalid Email Address";
		else:
			$e = mysqli_real_escape_string($dbc, $_POST['email']);
		endif;
	endif;
	if(empty($_POST['pass1']) || empty($_POST['pass2'])):
		if(empty($_POST['pass1'])):
			$reg_errors['pass1'] = "Field cannot be empty";
		endif;
		if(empty($_POST['pass2'])):
			$reg_errors['pass2'] = "Field cannot be empty";
		endif;
	else:
		if($_POST['pass1'] != $_POST['pass2']):
			$reg_errors['pass2'] = "Passwords do not match";
		else:
			$pattern = "/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[\_!-\.@#%]).{6,16}$/";
			if(!preg_match($pattern, $_POST['pass1'])):
				$reg_errors['pass2'] = "Minimum 6 characters, Needs to have least 1 number and 1 special character";
			else:
				$p = password_hash(mysqli_real_escape_string($dbc, $_POST['pass1']), PASSWORD_DEFAULT);
			endif;
		endif;
	endif;

	$err = 0;
	foreach($reg_errors as $error):
		if($error != ''):
			$err += 1;
		endif;
	endforeach;

	$message = false;
	$email_taken = false;
	$user_taken = false;
	if($err == 0):
		$query = "SELECT username, email FROM users WHERE username = '$u' OR email = '$e'";
		$result = mysqli_query($dbc, $query) or die ("Select Query Denied");
		if(mysqli_num_rows($result) == 0):
			$query = "INSERT INTO users(type, username, email, pass, first_name, 
										last_name, date_expires)
					  VALUES ('member', '$u', '$e', '$p', '$fn', '$ln', 
					  					DATE_ADD(NOW(), INTERVAL 1 MONTH))";
			$result = mysqli_query($dbc, $query) or die("Insert Query Denied");
			if(mysqli_affected_rows($dbc) == 1):
				$message = true;
				$body = "Thank you for registering with code break!";
				mail("khan.photon@gmail.com", "Registration Confirmation", $body, "From:khan.photon@gmail.com");
			else:
				trigger_error("You could not be registered due to a system error. We apologize for the inconvenience.");
			endif;
		elseif(mysqli_num_rows($result) == 1):
			while($row = mysqli_fetch_array($result)):
				if($row['username'] == $u):
					$user_taken = true;
				endif;
				if($row['email'] == $e):
					$email_taken = true;
				endif;
			endwhile;
		endif;
	endif;
endif;

$body = "<h3 class = 'pl-2'> Register </h3>
		<p class = 'pl-2 mb-0'> Access to the site's content is available to registered users at a cost of <strong>1000 TK</strong> per month.</p>
		<p class = 'pl-2 mb-0 text-primary'> Use the form below to beigin registration process</p>
		<p class = 'pl-2 mb-0 text-danger'><strong>Note: All fields are required</strong></p>
		<p class = 'text-success pl-2 mb-0'>After completing this form, you'll be presented with the opportunity</p>
		<p class = 'text-success pl-2 mb-0'> to securely pay for your yearly subscription via
		<kbd><a href = 'http://www.paypal.com' class = 'nounderline text-white'>PayPal</a><kbd></p>
		<button type = 'button' class = 'btn btn-primary ml-3 mt-3' data-toggle = 'modal' 
		data-target = '#registrationModal'>Register</button> ";

if(isset($email_taken) && isset($user_taken)):
	if($user_taken == true && $email_taken == false):
		$body .= "<div class = 'card ml-3 mt-3' style = 'width:250px'>
					<div class='card-header'>
						<img src = '/E-Commerce/images/user.png' class = 'card-img-top'/>
						<h4 class = 'text-warning'>Username Already Taken</h4>
					</div>
				 	<div class='card-body'>
				 		<p class = 'text-secondary'>Please choose other username!</p>
				 	</div> 
				</div>";
	endif;
	if($email_taken == true && $user_taken == false):
		$body .= "<div class = 'card ml-3 mt-3' style = 'width:250px'>
					<div class='card-header'>
					  <img src = '/E-Commerce/images/hdd.png' class = 'card-img-top'/>
							<h4 class = 'text-warning'>This email address has already been registered</h4>
					 </div>
				 	<div class='card-body'>
				 		<p class = 'text-secondary'>Forgot Password? Click link to the right</p>
				 	</div> 
				  </div>";
	endif;
	if($email_taken == true && $user_taken == true):
		$body .= "<div class = 'card ml-3 mt-3' style = 'width:250px'>
					<div class='card-header'>
						<img src = '/E-Commerce/images/hdd.png' class = 'card-img-top'/>
						<h4 class = 'text-warning'>This email address has already been registered</h4>
					</div>
				 	<div class='card-body'>
				 		<p class = 'text-secondary'>Forgot Password? Click link to the right</p>
				 	</div> 
				</div>";
	endif;
endif;

if(isset($message)):
	if($message == true):
		$body .= "<div class = 'card ml-3 mt-3' style = 'width:250px'>
					<div class='card-header'>
						<img src = '/E-Commerce/images/geek.png' class = 'card-img-top'/>
						<h4 class = 'text-success'>Thanks!</h4>
					</div>
				  	<div class='card-body'>
				  		<p> Thank you for registering at <code>Code Break</code></p>
				 	</div> 
				</div>";
	elseif($email_taken == true|| $user_taken == true):
	else:
		$body .= "<div class = 'card ml-3 mt-3' style = 'width:250px'>
					<div class='card-header'>
						<img src = '/E-Commerce/images/denied.png' class = 'card-img-top'/>
						<h4 class = 'text-danger'>Oops! Something went wrong with registeration!</h4>
					</div>
				  	<div class='card-body'>
				 		<p class = 'text-danger'> We are sorry for the inconveniece!</p>
				 		<p class = 'text-info'> Please click the register button again!</p>
				 	</div> 
				</div>";
	endif;
endif;
		echo "<div class = 'modal fade' id = 'registrationModal'>";
		echo "	<div class = 'modal-dialog'>";
		echo "		<div class = 'modal-content'>";
			echo "		<div class = 'modal-header'>";
			echo "			<h4 class = 'modal-title'> Registration </h4>";
			echo "			<button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>";
			echo "		</div>";
			echo "		<div class = 'modal-body'>";
							echo '	<form method = "post" action = "'.str_replace('_','-',basename($_SERVER['PHP_SELF'], '.php')).'" class = "form-group">';
							echo '		<div class = "form-group">';
							echo '			<label for = "first_name">First Name</label>';
											create_form_input("first_name", "text");
							echo '		<span class = "text-danger">'.$reg_errors['first_name'].'</span>';
								echo  '</div>';
							echo '		<div class = "form-group">';
							echo '			<label for = "last_name">Last Name</label>';
										    create_form_input("last_name", "text");
							echo '		<span class = "text-danger">'.$reg_errors['last_name'].'</span>';
								echo  '</div>';
							echo '		<div class = "form-group">';
							echo '			<label for = "username">Desired Username</label>';
												create_form_input("username", "text");
							echo '		<span class = "text-danger">'.$reg_errors['username'].'</span>';
								echo  '</div>';
							echo '		<div class = "form-group">';
							echo '			<label for = "email">Email</label>';
												create_form_input("email", "text");
							echo '		<span class = "text-danger">'.$reg_errors['email'].'</span>';
								echo  '</div>';
							echo '		<div class = "form-group">';
							echo '			<label for = "pass1">Password</label>';
												create_form_input("pass1", "password");
							echo '		<span class = "text-danger">'.$reg_errors['pass1'].'</span>';
								echo  '</div>';
							echo '		<div class = "form-group">';
							echo '			<label for = "pass2">Confirm Password</label>';
												create_form_input("pass2", "password");
							echo '		<span class = "text-danger">'.$reg_errors['pass2'].'</span>';
								echo  '</div>';
							echo '		<input type = "submit" class = "btn btn-success" id = "submit_button" name = "registration"';
							echo '			   value = "Next &rarr;"/>';
							echo '	</form>	';
			echo "		</div>";
			echo "		<div class = 'modal-footer'>";
			echo "			<button type = 'button' class = 'btn btn-danger' data-dismiss = 'modal'> Close </button>";
			echo "		</div>";
		echo "		</div>";
		echo "	</div>";
		echo "</div>";
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/body.php");
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/footer.php");

