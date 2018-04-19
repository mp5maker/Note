<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce2/includes/config.php");
require_once(MYSQL);
require_once(BASE."admin/includes/admin_info.php");
require_once(BASE."admin/includes/password.php");

$page_title = "Admin Login";
$admin_errors = array();
if($_SERVER['REQUEST_METHOD'] == "POST"):
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):
		if($_POST['email'] == USER):
			$admin_email = $_POST['email'];
		else:
			$admin_errors['email'] = "Invalid Username!";
		endif;
	else:
		$admin_errors['email'] = "Invalid Username!";
	endif;

	$password_set = password_hash(PASS, PASSWORD_DEFAULT);
	if(password_verify($_POST['pass'], $password_set)):
		$admin_pass = $_POST['pass'];
	else: 
		$admin_errors['pass'] = "Invalid Password!";
	endif;

	if(empty($admin_errors)):
		$_SESSION['user_admin'] = $admin_email;
		$_SESSION['user_admin_pass'] = $admin_pass;
	endif;
endif;
require_once(BASE."admin/views/admin_login.php");

if(isset($_SESSION['user_admin']) && isset($_SESSION['user_admin_pass'])):
	if(($_SESSION['user_admin'] = USER) && ($_SESSION['user_admin_pass'] == PASS)):
		$cur_page = "Admin";
		require_once(BASE."admin/views/admin_panel.php");
	else:
		require_once(BASE."admin/views/admin_error.php");
	endif;
endif;
require_once(BASE."includes/template.php");

