<?php
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce2/includes/config.php");
require_once(BASE."includes/mysqli.php");

$type = '';
$category = '';
$category_id = '';

if(isset($_GET['type'], $_GET['category'], $_GET['id'])):
	if(filter_var($_GET['id'], FILTER_VALIDATE_INT)):
		$category = $_GET['category'];
		$category_id = $_GET['id'];
		if($_GET['type'] == 'goodies'):
			$type = $_GET['type'];
		elseif($_GET['type'] == 'coffee'):
			$type = $_GET['type'];
		endif;
	endif;
	if(!$type || !$category || !$category_id):
		require_once(BASE."views/error.php");
		require_once(BASE."includes/template.php");
		exit();
	endif;
	$page_title = ucfirst($type)." to Buy:: ".$category;
	require_once(MYSQL);
	$result = mysqli_query($dbc, "CALL select_products('$type','$category_id')");
	if(mysqli_num_rows($result) >= 1):
		if($type == 'goodies'):
			require_once(BASE."views/list_products.php");
		elseif($type == 'coffee'): 
			require_once(BASE."views/list_coffees.php");
		else:
			require_once(BASE."views/noproducts.php");
		endif;
	else:
		require_once(BASE."views/noproducts.php");
	endif;
	require_once(BASE."includes/template.php");
endif;
