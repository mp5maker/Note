<?php 
$login_errors['user_pass'] = '';
$login_errors['user_email'] = '';

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])):
	if(filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)):
		$e = mysqli_real_escape_string($dbc, $_POST['user_email']);
	else:
		$login_errors['user_email'] = "Please enter a valid email address!";
	endif;

	if(!empty($_POST['user_pass'])):
		$pattern = "/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[\_!-\.@#%]).{6,16}$/";
		if(preg_match($pattern, $_POST['user_pass'])):
			$p = mysqli_real_escape_string($dbc, $_POST['user_pass']);
		else:
			$login_errors['user_pass'] = "Invalid Password!";
		endif;
	else: 
		$login_errors['user_pass'] = "Password field cannot be empty!";
	endif;

	$err_login = 0;
	foreach($login_errors as $login_error):
		if($login_error != ''):
			$err_login += 1;
		endif;
	endforeach;

	if($err_login == 0):
		$query = "SELECT id, username, type, IF(date_expires > Now(), true, false), pass
				  FROM users WHERE email = '$e'";
		$result = mysqli_query($dbc, $query);
		if(mysqli_num_rows($result) == 1):
			$row = mysqli_fetch_array($result, MYSQLI_NUM);
			if(password_verify($p, $row[4])):
				echo "<meta http-equiv='refresh' content='1'>";
				if($row[2] == 'admin'):
					// session_regenerate_id(true);
					$_SESSION['user_admin'] = true;
				endif;
				$_SESSION['user_id'] = $row[0];
				$_SESSION['username'] = $row[1];
				// setcookie('user_id', $row[0], time() + (86400 * 30), "/");
				// setcookie('username', $row[1], time() + (86400 * 30), "/");
				if($row[3] == 1):
					$_SESSION['user_not_expired'] = true;
				endif;
			else:
				$login_errors['user_pass'] = "Password do not match";
			endif;
		endif;
		if(mysqli_num_rows($result) == 0):
			$login_errors['user_pass'] = "Email Address do not exist!";
		endif;
	endif;
endif;
?>
<div class = "text-success border border-warning p-2"> 
	<h4> Login </h4>
	<form method = "post" action = "<?php echo str_replace('_','-',basename($_SERVER['PHP_SELF'], '.php')); ?>">
		<div class = "form-group">
			<label for = "user_email"> Email </label>
			<?php create_form_input('user_email', 'text');?>
			<span class = "text-danger"><?php echo $login_errors['user_email'];?></span>
		</div>
		<div class = "form-group">
			<label for = "user_pass"> Password </label>
			<?php create_form_input('user_pass', 'password');?>
			<span class = "text-danger"><?php echo $login_errors['user_pass'];?></span>
		</div>
		<input type = "submit" class = "btn btn-success" name = "login" value = "Confirm"/>
	</form>
	<a href = "forgot-password" class = "nounderline text-info">
		<code> Forgot your password? </code>
	</a>
</div>
