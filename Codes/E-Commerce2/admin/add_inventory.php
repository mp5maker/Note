<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce2/includes/config.php");
require_once(BASE."admin/includes/admin_info.php");
require_once(BASE."includes/product_status.php");

if(isset($_SESSION['user_admin']) && isset($_SESSION['user_admin_pass'])):
	if(($_SESSION['user_admin'] == USER) && ($_SESSION['user_admin_pass'] == PASS)):
		$page_title = "Add Inventory";
		$cur_page = "Add Inventory";
		require_once(MYSQL);
		if($_SERVER['REQUEST_METHOD'] == 'POST'):
			if(isset($_POST['add']) && is_array($_POST['add'])):
				require_once(BASE."includes/form_functions.php");
				$query1 = "UPDATE specific_coffees SET stock=stock+? WHERE id=?";
				$query2 = "UPDATE non_coffee_products SET stock=stock+? WHERE id=?";
				$stmt1 = mysqli_prepare($dbc, $query1);
				$stmt2 = mysqli_prepare($dbc, $query2);
				mysqli_stmt_bind_param($stmt1, 'ii', $qty, $id);
				mysqli_stmt_bind_param($stmt2, 'ii', $qty, $id);
				$affected = 0;

				foreach($_POST['add'] as $sku => $qty):
					if(filter_var($qty, FILTER_VALIDATE_INT, ['min_range' => 1])):
						list($type, $id) = parse_sku($sku);
						if($type == 'coffee'):
							mysqli_stmt_execute($stmt1);
							$affected += mysqli_stmt_affected_rows($stmt1);
						elseif($type == 'goodies'):
							mysqli_stmt_execute($stmt2);
							$affected += mysqli_stmt_affected_rows($stmt2);
						endif;
					endif;
				endforeach;
				$success = "$affected items(s) Were Updated!";
			endif;
		endif;
		require_once(BASE."admin/views/add_inventory.php");
	endif;
else:
	require_once(BASE."admin/views/admin_error.php");
endif;
require_once(BASE."includes/template.php");

