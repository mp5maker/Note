<?php
require_once(BASE."includes/form_functions.php");
$content = "
	<div class = 'row mt-2 ml-2 mr-2'>
		<div class = 'col'>
			<h2> Admin Sign In </h2>
			<form method = 'post' action = '".$_SERVER['PHP_SELF']."'>
					".create_form_input('email','text', $admin_errors)."
					".create_form_input('pass','password', $admin_errors)."
					<input type = 'submit' class = 'btn btn-success'/>
			</form>
		</div>
	</div>
";