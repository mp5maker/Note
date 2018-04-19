<?php 
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce2/includes/config.php");
require_once(BASE."admin/includes/admin_info.php");
$add_coffee_errors = array();

if(isset($_SESSION['user_admin']) && isset($_SESSION['user_admin_pass'])):
	if(($_SESSION['user_admin'] == USER) && ($_SESSION['user_admin_pass'] == PASS)):
		$page_title = "Add Specific Coffee";
		$cur_page = "Add Coffee";
		require_once(MYSQL);
		$count = 10;
		if($_SERVER['REQUEST_METHOD'] == 'POST'):
			if(isset($_POST['category']) && filter_var($_POST['category'], FILTER_VALIDATE_INT, ['min_range' => 1])):
				$query = "INSERT INTO specific_coffees (general_coffee_id, size_id, caf_decaf, ground_whole, price, stock)
						  VALUES(?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_prepare($dbc, $query);
				mysqli_stmt_bind_param($stmt, 'iissdi', $_POST['category'], $size, $caf_decaf, $ground_whole, $price, $stock);
				$affected = 0;
				for($i = 1; $i <= $count; $i++):
					if(filter_var($_POST['stock'][$i], FILTER_VALIDATE_INT, ['min_range' => 1])):
						if(filter_var($_POST['price'][$i], FILTER_VALIDATE_FLOAT) && $_POST['price'] > 0):
							$size = $_POST['size'][$i];
							$caf_decaf = $_POST['caf_decaf'][$i];
							$ground_whole = $_POST['ground_whole'][$i];
							$price = $_POST['price'][$i] * 100;
							$stock = $_POST['stock'][$i];
							mysqli_stmt_execute($stmt);
							$affected += mysqli_stmt_affected_rows($stmt);
						endif;
					endif;
				endfor;
				$success = "$affected Product(s) Were Created!";		
			endif;
		else:
			$failure = "Please select a category";
		endif;
		require_once(BASE."admin/views/add_coffees.php");
	endif;
else:
	require_once(BASE."admin/views/admin_error.php");
endif;
require_once(BASE."includes/template.php");
