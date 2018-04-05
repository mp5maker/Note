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


