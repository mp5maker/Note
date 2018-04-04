<?php 
function create_form_input($name, $type){
	$value = false;
	if(isset($_POST[$name])):
		$value = $_POST[$name];
	endif;
	if($value && get_magic_quotes_gpc()):
		$value = stripslashes($value);
	endif;
	if($type == 'text' || $type == 'password'):
		echo "<input type = '".$type."' name = '".$name."' id = '".$name."' ";
		if($value):
			echo "value = '".htmlspecialchars($value)."' ";
			echo "class = 'form-control'/>";
		else:
			echo "class = 'form-control'/>";
		endif;
	endif;
}

function redirect_invalid_user($check = "user_id", $destination = "index.php", 
							   $protocol = "http://"){
	if(headers_sent()):
		if(!isset($_SESSION[$check])):
			$url = $protocol.BASE_URL.$destination;
			header("Location:$url");
			exit();
		endif;
	else:
		include_once($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/header.php');
		trigger_error("You do not have the permission to access this page. Please log in and try again");
		include_once($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/footer.php');
	endif;
}

