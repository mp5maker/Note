<?php 
define("MYSQL", $_SERVER['DOCUMENT_ROOT']."/E-Commerce2/includes/mysqli.php");
define("BASE", $_SERVER['DOCUMENT_ROOT']."/E-Commerce2/");

$live = false;
$contact_email = 'khan.photon@gmail.com';
$admin_email = "khan.photon@gmail.com";

function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars){
	global $live, $contact_email, $admin_email;
	$message = "Error: $e_file on line $e_line:\n $e_message\n";
	$message .= "<pre>".print_r(debug_backtrace(),1)."</pre>\n";
	if(!$live):
		echo "<div class = 'error'>".nl2br($message)."</div>";
	else:
		error_log($message, 1, $contact_email, 'From:$admin_email');
		if($e_number != E_NOTICE):
			echo "<div class = 'error'> A system error has occurred. We apologize for the inconvenience</div>";
		endif;
	endif;
}
set_error_handler('my_error_handler');
