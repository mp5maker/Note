<?php 
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce2/includes/config.php");
require_once(BASE."admin/includes/admin_info.php");

if(isset($_SESSION['user_admin']) && isset($_SESSION['user_admin_pass'])):
	if(($_SESSION['user_admin'] == USER) && ($_SESSION['user_admin_pass'] == PASS)):
		$page_title = "Create Sales";
		$cur_page = "Create Sales";
		require_once(MYSQL);
		if($_SERVER['REQUEST_METHOD'] == 'POST'):
			if(isset($_POST['sale_price'], $_POST['start_date'], $_POST['end_date'])):
				require_once(BASE."includes/product_status.php");
				$query = "INSERT INTO sales (product_type, product_id, price, start_date, end_date)
						  VALUES (?, ?, ?, ?, ?)";
				$stmt = mysqli_prepare($dbc, $query);
				mysqli_stmt_bind_param($stmt, 'sidss', $type, $id, $price, $start_date, $end_date);
				$affected = 0;
				foreach($_POST['sale_price'] as $sku => $price):
					if(filter_var($price, FILTER_VALIDATE_FLOAT)):
						if($price > 0 && !empty($_POST['start_date'][$sku])):
							list($type, $id) = parse_sku($sku);
						endif;
						$start_date = $_POST['start_date'][$sku];
						$end_date = (empty($_POST['end_date'][$sku]))? NULL : $_POST['end_date'][$sku];
						mysqli_stmt_execute($stmt);
						$affected += mysqli_stmt_affected_rows($stmt);
					endif;
				endforeach;
				$success = "$affected Sales Were Created!";
			endif;
		endif;
		require_once(BASE."admin/views/create_sales.php");
	endif;
else:
	require_once(BASE."admin/views/admin_error.php");
endif;
require_once(BASE."includes/template.php");