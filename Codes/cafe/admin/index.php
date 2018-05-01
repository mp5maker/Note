<?php
ob_start();
require_once($_SERVER['DOCUMENT_ROOT']."/cafe/admin/includes/config.php");
require_once(BASE.'/cafe/admin/includes/validator.php');
require_once(BASE."/cafe/admin/includes/user_access.php");
$page_title = 'Admin Panel';
$admin_errors = array();

if($valid == true):
	$errors = array();	
	$messages = array();
	require_once(BASE."/cafe/admin/includes/password.php");
	require_once(BASE."/cafe/admin/includes/database.php");
	require_once(BASE."/cafe/admin/includes/date_functions.php");
	require_once(BASE."/cafe/admin/includes/settings.php");
	require_once(BASE."/cafe/admin/includes/add.php");
	require_once(BASE."/cafe/admin/includes/update.php");
	require_once(BASE."/cafe/admin/includes/delete.php");
	require_once(BASE."/cafe/admin/includes/image_list.php");
	require_once(BASE."/cafe/admin/includes/fontawesomelist.php");
	require_once(BASE."/cafe/admin/includes/create_form.php");
	require_once(BASE."/cafe/admin/views/admin_index.php");
else:
	if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['admin_submit']):
		$validator = new Validator();
		$validator->email($_POST['user'], 'user');		
		$validator->password($_POST['user_pass'], 'user_pass');
		$admin_errors = $validator->errors();
		if(empty($errors)):
			if(checkUser($_POST['user'], $_POST['user_pass'])):
				$success = "Admin successfully logged in";
				$_SESSION['user'] = $_POST['user'];
				$_SESSION['user_pass'] = $_POST['user_pass'];
				$url = "/cafe/admin/";
				$host = $_SERVER['HTTP_HOST'];
				header("Location: http://$host$url");
				exit();
				ob_end_flush();
				ob_end_clean();
			else:
				$failure = 'Sorry, the admin details are incorrect!';
			endif;
		endif;		
	endif;
	require_once(BASE.'/cafe/admin/views/login.php');
endif;
require_once(BASE."/cafe/admin/includes/template.php");

