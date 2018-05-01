<?php
require_once(BASE.'/cafe/admin/includes/create_form.php');

$content = "
	<div class = 'row m-2'>
		<div class = 'col-sm-4'></div>
		<div class = 'col-sm-4'>
		<h1> Admin Login </h1>
";
//Creating the Form
$form = new createForm();
$form->createText('Email', 'user', 'text', $admin_errors);
$form->createText('Password', 'user_pass', 'password', $admin_errors);
$form->createSubmit('admin_submit', 'submit', 'Confirm');
$form->end();
$content .= $form;

if(isset($success)):
	$content .= "
		<span class = 'text-success m-2'> $success </span>
	";
endif;

if(isset($failure)):
	$content .= "
		<span class = 'text-danger m-2'> $failure </span>
	";

endif;
$content .= "
		</div>
		<div class = 'col-sm-4'></div>
	</div>
";