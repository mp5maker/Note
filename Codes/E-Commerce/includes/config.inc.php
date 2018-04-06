<?php
$live = false;
$contact_email = "khan.photon@gmail.com";
// define('BASE_URI', $_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/pdfs/');
// define('BASE_URL', $_SERVER['DOCUMENT_ROOT'].'/E-Commerce/');
define('MYSQL', $_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/mysql.inc.php');

session_start();

function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars){
	global $live, $contact_email;
	$message = "An error occured in script {$e_file} on line {$e_line}: \n {$e_message}\n";
	$message .= "<pre>".print_r(debug_backtrace(),1)."</pre>\n";
	$message .= "<pre>".print_r($e_vars,1)."</pre>\n";
	if(!$live):
		echo "<div class = 'error'>".nl2br($message)."</div>";
	else:
		error_log($message, 1, $contact_emails, "From:khan.photon@gmail.com");
	endif;

	if($e_number!= E_NOTICE):
		echo "<div class = 'error'> A system error occurred. We apologize for the inconvenience. </div>";
	endif;
	return true;
}

set_error_handler("my_error_handler");