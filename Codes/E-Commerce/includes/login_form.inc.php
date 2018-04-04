<div class = "sidebar col-2 d-none d-sm-block">
	<div class = "text-success border border-warning p-2"> 
		<h4> Login Form </h4>
		<form method = "post" action = "/E-Commerce/includes/form_functions.inc.php">
			<div class = "form-group">
				<label for = "user"> Username </label>
				<?php create_form_input('user', 'text');?>
			</div>
			<div class = "form-group">
				<label for = "user_pass"> Password </label>
				<?php create_form_input('user_pass', 'password');?>
			</div>
			<input type = "submit" class = "btn btn-success" name = "submit" value = "Confirm"/>
		</form>
	</div>
</div>
