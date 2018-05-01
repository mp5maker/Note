<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/cafe/admin/includes/database.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/cafe/admin/includes/password.php');

/**
 * checkUser
 * @param  string $user 
 * @param  string $pass 
 * @return boolean       
 */
function checkUser($user, $pass){
	$db = new database();
	$db->table('admin');
	$db->select(['id','email', 'pass']);
	$db->num();

	if($db->num() > 0):
		$fetch = $db->fetch();
		for($i = 0; $i < $db->num(); $i++):
				$email[] = $fetch[$i][1];
				$pwd[] = $fetch[$i][2];
		endfor;
	else:
		echo "No Admin has been assigned!";
		return false;
	endif;

	if(in_array($user, $email)):
		$db->select(['id', 'pass'], ['email' => $user]);
		if($db->num() == 1):
			$data = $db->fetch();
			if(password_verify($pass, $data[0][1])):
				$session_id = session_id();
				$_SESSION['user'] = $user;
				$_SESSION['user_id'] = $data[0][0];
				return true;
			else:
				return false; 
			endif;
		else:
			return false; 
		endif;
	else:
		return false; 
	endif;
}

if(isset($_SESSION['user'], $_SESSION['user_pass'])):
	$valid = checkUser($_SESSION['user'], $_SESSION['user_pass']);
else: 
	$valid = false;
endif;