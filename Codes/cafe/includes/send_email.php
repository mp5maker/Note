<?php
require_once(BASE."/cafe/admin/includes/database.php");

$db = new database();

//Send Email
if(isset($_POST['email_submit'])):
	if($_POST['email_submit'] == true):
		$name = trim($_POST['name']);
		$name = htmlspecialchars($name);
		
		$email = trim($_POST['email']);
		$email = htmlspecialchars($email);
		
		$gender = isset($_POST['gender'])? trim($_POST['gender']) : '';
		$gender = htmlspecialchars($gender);
		
		$question = trim($_POST['question']);
		$question = htmlspecialchars($question);

		$description = trim($_POST['description']);
		$description = htmlspecialchars($description);
		
		$captcha = trim($_POST['captcha']);
		$captcha = htmlspecialchars($captcha);

		$validator = new Validator();
		$validator->email($_POST['email'], 'email');
		$email_valid = false;
		if($validator->errors()):
			$errors['email'] = $validator->errors()['email']; 
		else:
			$email_valid = true; 
		endif;

		if(
			!empty($name) && !empty($email) &&
			!empty($gender) && !empty($question) &&
			!empty($description) && !empty($captcha) &&
			$captcha == $_SESSION['captcha'] && $email_valid
			):
			$db = new database();
			$db->table("email");
			$db->insert(['name','email', 'gender', 'question', 'description'], 
						[$name, $email, $gender, $question, $description
					   ]);
			if($db->affected()):
				$messages['email_submit'] = 'Email Sent Successfully';
			else:
				$errors['captcha'] = 'Email Failed!';
			endif;
		else:
		endif;
		if(empty($name)):
			$errors['name'] = 'Field cannot be empty';
		endif;
		if(empty($email)):
			$errors['email'] = 'Field cannot be empty';
		elseif(!$email_valid):
			$errors['email'] = 'Please, enter a valid email address';
		endif;
		if(empty($gender)):
			$errors['gender'] = 'Field cannot be empty';
		endif;
		if(empty($question)):
			$errors['question'] = 'Field cannot be empty';
		endif;
		if(empty($description)):
			$errors['description'] = 'Field cannot be empty';
		endif;
		if(empty($captcha)):
			$errors['captcha'] = 'Field cannot be empty';
		elseif($captcha != $_SESSION['captcha']):
			$errors['captcha'] = 'Captcha do not match!';
		endif;
	endif;
endif;