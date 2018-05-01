<?php
$errors['add_username'] = isset($errors['add_username'])? $errors['add_username']: '';
$errors['add_pwd'] = isset($errors['add_pwd'])? $errors['add_pwd']: '';
$errors['add_pwd2'] = isset($errors['add_pwd2'])? $errors['add_pwd2']: '';
$messages['add_admin'] = isset($messages['add_admin'])? $messages['add_admin']: '';
$add_user = isset($_POST['add_username'])? $_POST['add_username']: '';
$add_pwd = isset($_POST['add_pwd'])? $_POST['add_pwd']: '';
$add_pwd2 = isset($_POST['add_pwd2'])? $_POST['add_pwd2']: '';
$content .= "
	<div class = 'jumbotron jumbotron-fluid'>
		<h1 class = 'text-center text-danger' id = 'administrative'> Administrative Settings </h1>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Administrators</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Email</th>
						<th>Date Created</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat = 'a in adminData'>
						<td>{{a.id}}</td>
						<td>{{a.email}}</td>
						<td>{{a.date_created}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-info m-2'> Add </h3>
			<form class = 'form' method = 'post' action = ".$_SERVER['PHP_SELF']." >
				<div class = 'col-auto'>
				     <label class = 'sr-only' for = 'add_username'>Username</label>
				     <div class = 'input-group mb-2'>
				        <div class = 'input-group-prepend'>
				          <div class = 'input-group-text'>
				          	<i class = 'icon-envelope'></i>
				          </div>
				        </div>
				        <input type = 'text' class = 'form-control' id = 'add_username' placeholder = 'Username' name = 'add_username' value = '".$add_user."''>
				     </div>
			        <span class = 'text-danger'>".$errors['add_username']."</span>
				</div>
				<div class = 'col-auto'>
				     <label class = 'sr-only' for = 'add_pwd'>Password</label>
				     <div class = 'input-group mb-2'>
				        <div class = 'input-group-prepend'>
				          <div class = 'input-group-text'>
				          	<i class = 'icon-key'></i>
				          </div>
				        </div>
				        <input type = 'password' class = 'form-control' id = 'add_pwd' placeholder = 'Password' name = 'add_pwd' value = '".$add_pwd."''>
				     </div>
			        <span class = 'text-danger'>".$errors['add_pwd']."</span>
				</div>
				<div class = 'col-auto'>
				     <label class = 'sr-only' for = 'add_pwd2'>Password</label>
				     <div class = 'input-group mb-2'>
				        <div class = 'input-group-prepend'>
				          <div class = 'input-group-text'>
				          	<i class = 'icon-key'></i>
				          </div>
				        </div>
				        <input type = 'password' class = 'form-control' id = 'add_pwd2' placeholder = 'Retype Password' name = 'add_pwd2' value = '".$add_pwd2."''>
				     </div>
			        <span class = 'text-danger'>".$errors['add_pwd2']."</span>
				</div>
				<div class = 'col-auto'>
					<input class = 'btn btn-info' type = 'submit' name = 'add_admin' value = 'Add'/>
			        <span class = 'text-success'>".$messages['add_admin']."</span>
				</div>
			</form>
		</div>
		";
$errors['update_username'] = isset($errors['update_username'])? $errors['update_username']: '';
$errors['update_pwd'] = isset($errors['update_pwd'])? $errors['update_pwd']: '';
$errors['update_new_pwd'] = isset($errors['update_new_pwd'])? $errors['update_new_pwd']: '';
$errors['update_new_pwd2'] = isset($errors['update_new_pwd2'])? $errors['update_new_pwd2']: '';
$messages['update_admin'] = isset($messages['update_admin'])? $messages['update_admin']: '';
$update_user = isset($_POST['update_username'])? $_POST['update_username']: '';
$update_pwd = isset($_POST['update_pwd'])? $_POST['update_pwd']: '';
$update_new_pwd = isset($_POST['update_new_pwd'])? $_POST['update_new_pwd']: '';
$update_new_pwd2 = isset($_POST['update_new_pwd2'])? $_POST['update_new_pwd2']: '';
$content .= "
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-primary m-2'> Change Password </h3>
			<form class = 'form' method = 'post' action = ".$_SERVER['PHP_SELF']." >
				<div class = 'col-auto'>
				     <label class = 'sr-only' for = 'update_username'>Username</label>
				     <div class = 'input-group mb-2'>
				        <div class = 'input-group-prepend'>
				          <div class = 'input-group-text'>
				          	<i class = 'icon-envelope'></i>
				          </div>
				        </div>
				        <input type = 'text' class = 'form-control' id = 'update_username' placeholder = 'Username' name = 'update_username' value = '".$update_user."''>
				     </div>
			        <span class = 'text-danger'>".$errors['update_username']."</span>
				</div>
				<div class = 'col-auto'>
				     <label class = 'sr-only' for = 'update_pwd'>Current Password</label>
				     <div class = 'input-group mb-2'>
				        <div class = 'input-group-prepend'>
				          <div class = 'input-group-text'>
				          	<i class = 'icon-key'></i>
				          </div>
				        </div>
				        <input type = 'password' class = 'form-control' id = 'update_pwd' placeholder = 'Current Password' name = 'update_pwd' value = '".$update_pwd."''>
				     </div>
			        <span class = 'text-danger'>".$errors['update_pwd']."</span>
				</div>
				<div class = 'col-auto'>
				     <label class = 'sr-only' for = 'update_new_pwd'>New Password</label>
				     <div class = 'input-group mb-2'>
				        <div class = 'input-group-prepend'>
				          <div class = 'input-group-text'>
				          	<i class = 'icon-key'></i>
				          </div>
				        </div>
				        <input type = 'password' class = 'form-control' id = 'update_new_pwd' placeholder = 'New Password' name = 'update_new_pwd' value = '".$update_new_pwd."''>
				     </div>
			        <span class = 'text-danger'>".$errors['update_new_pwd']."</span>
				</div>
				<div class = 'col-auto'>
				     <label class = 'sr-only' for = 'update_new_pwd2'>Password</label>
				     <div class = 'input-group mb-2'>
				        <div class = 'input-group-prepend'>
				          <div class = 'input-group-text'>
				          	<i class = 'icon-key'></i>
				          </div>
				        </div>
				        <input type = 'password' class = 'form-control' id = 'update_new_pwd2' placeholder = 'Retype New Password' name = 'update_new_pwd2' value = '".$update_new_pwd2."''>
				     </div>
			        <span class = 'text-danger'>".$errors['update_new_pwd2']."</span>
				</div>
				<div class = 'col-auto'>
					<input class = 'btn btn-primary' type = 'submit' name = 'update_admin' value = 'Change Password'/>
			        <span class = 'text-success'>".$messages['update_admin']."</span>
				</div>
			</form>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-danger m-2'> Delete </h3>
		";
		$form = new createForm(); 
		$form->createSelect("Delete Admin", "delete_admin_id", $admin_id, $errors);
		$form->createSubmit("delete_admin", "submit", "Delete", "btn-danger");
		$delete_admin = $form->end();
		if(!isset($messages['delete_admin'])) $messages['delete_admin'] = '';
$content .= "
		{$delete_admin}
		<span class = 'text-success m-2'>{$messages['delete_admin']}</span>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Emails Received</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Question</th>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat = 'em in emailData'>
						<td>{{em.id}}</td>
						<td>{{em.name}}</td>
						<td>{{em.email}}</td>
						<td>{{em.gender}}</td>
						<td>{{em.question}}</td>
						<td>{{em.description}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-danger m-2'> Delete </h3>
		";
		$form = new createForm(); 
		$form->createSelect("Delete Email", "delete_email_id", $email_id, $errors);
		$form->createSubmit("delete_email", "submit", "Delete", "btn-danger");
		$delete_email = $form->end();
		if(!isset($messages['delete_email'])) $messages['delete_email'] = '';
$content .= "
		{$delete_email}
		<span class = 'text-success m-2'>{$messages['delete_email']}</span>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Upload Images</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-success m-2'> Add Image </h3>
	";
		$form = new createForm(true); 
		$form->createText("Beautify Image Name", "upload_image_name", "text", $errors);
		$form->createFile("Upload Image", "upload_image", "file", $errors);
		$form->createSubmit("upload_image_submit", "submit", "Upload", "btn-primary");
		$upload_image = $form->end();
		if(!isset($messages['upload_image'])) $messages['upload_image'] = '';
$content .= "
		{$upload_image}
		<span class = 'text-success m-2'>{$messages['upload_image']}</span>
		</div>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-danger m-2'> Delete Image</h3>
		";
		$form = new createForm(true); 
		$form->createSelect("Select Image", "delete_image", $image_list, $errors);
		$form->createSubmit("delete_image_submit", "submit", "Delete", "btn-danger");
		$delete_image = $form->end();
		if(!isset($messages['delete_image_submit'])) $messages['delete_image_submit'] = '';
$content .= "
		{$delete_image}
		<span class = 'text-danger m-2'>{$messages['delete_image_submit']}</span>
		</div>
	</div>
	<div class = 'jumbotron jumbotron-fluid'></div>
";