<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce2/includes/config.php");
require_once(BASE."admin/includes/admin_info.php");
$add_product_errors = array();

if(isset($_SESSION['user_admin']) && isset($_SESSION['user_admin_pass'])):
	if(($_SESSION['user_admin'] == USER) && ($_SESSION['user_admin_pass'] == PASS)):
		$page_title = "Add a Goodie";
		$cur_page = "add a goodie";
		require_once(MYSQL);
		if($_SERVER['REQUEST_METHOD'] == 'POST'):
			if(!isset($_POST['category']) || !filter_var($_POST['category'], FILTER_VALIDATE_INT, ['min_range' => 1])):
				$add_product_errors['category'] = 'Please select a category!';
			endif;
			if(empty($_POST['price']) || !filter_var($_POST['price'], FILTER_VALIDATE_FLOAT) || $_POST['price'] <= 0):
				$add_product_errors['price'] = 'Please enter a valid price!';
			endif;
			if(empty($_POST['stock']) || !filter_var($_POST['stock'], FILTER_VALIDATE_INT, ['min_range' => 1])):
				$add_product_errors['stock'] = 'Please enter the quantity in stock!';
			endif;
			if(empty($_POST['name'])):
				$add_product_errors['name'] = 'Please enter the name!';
			endif;
			if(empty($_POST['description'])):
				$add_product_errors['description'] = 'Please enter the description!';
			endif;
			if(is_uploaded_file($_FILES['image']['tmp_name']) && ($_FILES['image']['error']) == UPLOAD_ERR_OK && getimagesize($_FILES['image']['tmp_name']) > 8388608):
				$file = $_FILES['image'];
				$size = ROUND($file['size']/1024);
				if($size > 512):
					$add_product_errors['image'] = 'The uploaded file was too large!';
				endif;
				$allowed_mime = array('image/gif', 'image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
				$allowed_extensions = array('.jpg', '.gif', '.png', '.jpeg');
				$image_info = getimagesize($file['tmp_name']);
				$ext = substr($file['name'], -4);
				if(!in_array($file['type'], $allowed_mime) || !in_array($image_info['mime'], $allowed_mime) || !in_array($ext, $allowed_extensions)):
					$add_product_errors['image'] = 'The uploaded file was not the proper type!';
				endif;
				if(!array_key_exists('image', $add_product_errors) && isset($_FILES['image'])):
					if(!empty($_FILES['image'])):
						if(move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/E-Commerce2/images/".$_FILES['image']['name'])):
							$success = "The file was uploaded successfully!";
						endif;
					else:
						$add_product_errors['image'] = 'No file was chosen to upload!';
					endif;
				endif;
			else:
				$add_product_errors['image'] = 'The uploaded file was not the proper type!';
			endif;
			if(empty($add_product_errors)):
				$query = "INSERT INTO non_coffee_products(non_coffee_category_id, name, description, image, price, stock)
						  VALUES (?,?,?,?,?,?)";
				$stmt = mysqli_prepare($dbc, $query);
				$name = strip_tags($_POST['name']);
				$desc = strip_tags($_POST['description']);
				$price = $_POST['price']*100;
				mysqli_stmt_bind_param($stmt, 'isssdi', $_POST['category'], $name, $desc, $_FILES['image']['name'], $price, $_POST['stock']);
				mysqli_stmt_execute($stmt);
				if(mysqli_stmt_affected_rows($stmt) == 1):
					$success = "The product has been added successfully!";
					$_POST = array();
					$_FILES = array();
					unset($file);
				endif;
			else:
				unset($file);
			endif;			
		endif;
		require_once(BASE."admin/views/add_goodies.php");
	endif;
else:
	require_once(BASE."admin/views/admin_error.php");
endif;
require_once(BASE."includes/template.php");