<?php
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce2/includes/config.php");

if($_SERVER['REQUEST_METHOD'] == "GET"):
	if(isset($_GET['session'])):
		$uid = $_GET['session'];
		session_id($uid);
		session_start();
	else:
		echo "<meta http-equiv = 'refresh' content ='5; url=/E-Commerce2/cart'>";
		exit();
	endif;
else:
	session_start();
	$uid = session_id();
endif;

require_once(MYSQL);
$shipping_errors = array();

if($_SERVER['REQUEST_METHOD'] == "POST"):
	$pattern = "/^[A-Za-z\'.-]{2,20}$/";
	if(preg_match($pattern, $_POST['first_name'])):
		$fn = addslashes($_POST['first_name']);
	else:
		$shipping_errors['first_name'] = "Please enter your first name!";
	endif;

	$pattern = "/^[A-Za-z\'.-]{2,40}$/";
	if(preg_match($pattern, $_POST['last_name'])):
		$ln = addslashes($_POST['last_name']);
	else:
		$shipping_errors['last_name'] = "Please enter your last name!";
	endif;
	
	$pattern = "/^[A-Za-z0-9\'. -]{2,40}$/";
	if(preg_match($pattern, $_POST['address1'])):
		$a1 = addslashes($_POST['address1']);
	else:
		$shipping_errors['address1'] = "Please enter your street address!";
	endif;
	
	$pattern = "/^[A-Za-z0-9\'. -]{2,40}$/";
	if(empty($_POST['address2'])):
		$a2 = NULL;
	else:
		if(preg_match($pattern, $_POST['address2'])):
			$a2 = addslashes($_POST['address2']);
		else:
			$shipping_errors['address2'] = "Please enter your street address!";
		endif;
	endif;
	
	$pattern = "/^[A-Za-z\'.-]{2,60}$/";
	if(preg_match($pattern, $_POST['city'])):
		$c = addslashes($_POST['city']);
	else:
		$shipping_errors['city'] = "Please enter your city!";
	endif;
	
	$pattern = "/^[A-Z]{2}$/";
	if(preg_match($pattern, $_POST['state'])):
		$s = $_POST['state'];
	else:
		$shipping_errors['state'] = "Please enter your state!";
	endif;
	
	$pattern = "/(^\d{5}$)|(^\d{5}-\d{4}$)/";
	if(preg_match($pattern, $_POST['zip'])):
		$z = $_POST['zip'];
	else:
		$shipping_errors['zip'] = "Please enter your zip code!";
	endif;

	$phone = str_replace([" ", "-", "\,", "\/"], "", $_POST['phone']);
	$pattern = "/^[0-9]{10}$/";
	if(preg_match($pattern, $_POST['phone'])):
		$p = $_POST['phone'];
	else:
		$shipping_errors['phone'] = "Please enter your phone number!";
	endif;

	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):
		$e = $_POST['email'];
		$_SESSION['email'] = $_POST['email'];
	else:
		$shipping_errors['email'] = "Please enter a valid email address";
	endif;

	if(isset($_POST['use']) && $_POST['use'] == "Y"):
		$_SESSION['shipping_for_billing'] = true;
		$_SESSION['cc_first_name'] = $_POST['first_name'];
		$_SESSION['cc_last_name'] = $_POST['last_name'];
		$_SESSION['cc_address'] = $_POST['address1']." ".$_POST['address2'];
		$_SESSION['cc_city'] = $_POST['city'];
		$_SESSION['cc_state'] = $_POST['state'];
		$_SESSION['cc_zip'] = $_POST['zip'];
	endif;

	if(empty($shipping_errors)):
		$result = mysqli_query($dbc, "CALL add_customer('$e', '$fn', '$ln', '$a1', '$a2', '$c', '$s', '$z', '$p', @cid)");
		if($result):
			$result = mysqli_query($dbc, "SELECT @cid");
			if(mysqli_num_rows($result) == 1):
				list($_SESSION['customer_id']) = mysqli_fetch_array($result);
				echo "<meta http-equiv = 'refresh' content ='1; url=/E-Commerce2/billing'>";
				exit();
			endif;
		else:
			trigger_error("Your order could not be processed due to a system error. We apologize for the inconvenience.");
		endif;
	endif;
endif;

$page_title = "Coffee - Checkout - Your Shipping Information";
$result = mysqli_query($dbc, "CALL get_shopping_cart_contents('$uid')");
if(mysqli_num_rows($result) > 0):
	$cur_page = "shipping";
	require_once(BASE."views/checkout.php");
else:
	require_once(BASE."views/emptycart.php");
endif;
require_once(BASE."includes/checkout_template.php");
