<?php
require($_SERVER['DOCUMENT_ROOT']."/E-Commerce2/includes/config.php");
if(isset($_COOKIE['SESSION'])):
	$uid = $_COOKIE['SESSION'];
else:
	$uid = md5(uniqid('biped', true));	
endif;

setcookie('SESSION', $uid, time()+(60*60*24*30));
$cur_page = "Wishlist";
$page_title = "Coffee - Your Wishlist List";
require(MYSQL);
require_once(BASE."/includes/product_status.php");

if(isset($_GET['sku'])):
	list($type, $pid) = parse_sku($_GET['sku']);
endif;

if(isset($type, $pid, $_GET['action']) && $_GET['action'] == 'remove'):
	$result = mysqli_query($dbc, "CALL remove_from_wish_list('$uid', '$type', '$pid')");
elseif(isset($type, $pid, $_GET['action'], $_GET['qty']) && $_GET['action'] == 'move'):
	$qty = (filter_var($_GET['qty'], FILTER_VALIDATE_INT))? $_GET['qty'] : 1;
	$result = mysqli_query($dbc, "CALL add_to_wish_list('$uid', '$type', '$pid', '$qty')");
	$result = mysqli_query($dbc, "CALL remove_from_cart('$uid', '$type', '$pid')");
elseif(isset($_POST['quantity'])):
	foreach($_POST['quantity'] as $sku => $qty):
		list($type, $pid) = parse_sku($sku);
		if(isset($type, $pid)):
			$qty = (filter_var($qty, FILTER_VALIDATE_INT))? $qty : 1;
			$result = mysqli_query($dbc, "CALL update_wish_list('$uid', '$type', '$pid', '$qty')");
		endif;
	endforeach;
endif;

$result = mysqli_query($dbc, "CALL get_wish_list_contents('$uid')");
if(mysqli_num_rows($result) > 0):
	require_once(BASE."/views/wishlist.php");
else:
	$category = "Wishlist";
	require_once(BASE."/views/emptylist.php");
endif;
require(BASE."/includes/template.php");