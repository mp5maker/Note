<?php 
	require_once($_SERVER['DOCUMENT_ROOT']."/cafe/admin/includes/validator.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/cafe/admin/includes/scan.php");
	$errors = array();
	if($_POST):
		var_dump($_FILES['image']);
		$validator = new Validator();
		$validator->file($_FILES['image'], 'image');
		$errors = $validator->errors(); 
	endif;
?>

<!DOCTYPE html>
<html lang = 'en'>
	<head>
		<title><?php if(isset($page_title)) echo $page_title?></title>
		<meta charset = 'UTF-8'/>
		<meta name = 'viewport' content = 'width=device-width, initial-scale=1'/>
		<link rel = 'stylesheet' href = '/cafe/vendor/bootstrap/bootstrap.min.css'/>
		<link rel = 'stylesheet' href = '/cafe/vendor/font-awesome/css/font-awesome.css'/>
		<link rel = 'stylesheet' href = '/cafe/vendor/fonts/ubuntu.css'/>
		<link rel = 'stylesheet' href = '/cafe/css/style.css'/>
		<script src = '/cafe/vendor/bootstrap/jquery.min.js'></script>
		<script src = '/cafe/vendor/bootstrap/popper.min.js'></script>
		<script src = '/cafe/vendor/bootstrap/bootstrap.min.js'></script>
		<script src = '/cafe/vendor/angular/angular.js'></script>
		<script src = '/cafe/vendor/google/chart.js'></script>
		<script src = '/cafe/js/behaviour.js'></script>
 	</head>
 	<body>
		<?php require_once($_SERVER['DOCUMENT_ROOT']."/cafe/admin/includes/create_form.php"); ?>
		<?php $form = new createForm(true); ?>
		<?php $form->createFile("Upload Image", "image", "file", $errors);?>
		<?php $form->createSelect("Select Image", "select_image", $image_list, $errors);?>
		<?php $form->createSubmit("upload", "submit", "Confirm");?>
		<?php $upload = $form->end();?>
		<?php echo $upload;?>
 	</body>
</html>
