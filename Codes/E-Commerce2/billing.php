<?php
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce2/includes/config.php");
session_start();
$uid = session_id();
if(!isset($_SESSION['customer_id'])):
	echo "<meta http-equiv = 'refresh' content ='5; url=/E-Commerce2/checkout'>";
	exit();
endif;
require_once(MYSQL);
$billing_errors = array();
if($_SERVER['REQUEST_METHOD'] == "POST"):
	$pattern = "/^[A-Za-z\'.-]{2,20}$/";
	if(preg_match($pattern, $_POST['cc_first_name'])):
		$cc_first_name = addslashes($_POST['cc_first_name']);
	else:
		$billing_errors['cc_first_name'] = "Please enter your first name!";
	endif;
	
	$pattern = "/^[A-Za-z\'.-]{2,40}$/";
	if(preg_match($pattern, $_POST['cc_last_name'])):
		$cc_last_name = addslashes($_POST['cc_last_name']);
	else:
		$billing_errors['cc_last_name'] = "Please enter your last name!";
	endif;
	
	$cc_number = str_replace(['','-'],'',$_POST['cc_number']);
	if(
	   !preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/', $cc_number) && //Visa
	   !preg_match('/^5[1-5][0-9]{14}$/', $cc_number) && //MasterCard
	   !preg_match('/^3[47][0-9]{13}$/', $cc_number) && //American Express
	   !preg_match('/^6(?:011|5[0-9]{2})[0-9]{12}$/', $cc_number)  //Discover Card
		):
		$billing_errors['cc_number'] = "Please enter your credit card number!";
	endif;

	if($_POST['cc_exp_month'] < 1 || $_POST['cc_exp_month'] > 12):
		$billing_errors['cc_exp_month'] = "Please enter your expiration month";
	endif;

	if($_POST['cc_exp_year'] < date("Y")):
		$billing_errors['cc_exp_year'] = "Please enter your expiration year!";
	endif;

	if(preg_match('/^[0-9]{3,4}$/', $_POST['cc_cvv'])):
		$cc_cvv = $_POST['cc_cvv'];
	else:
		$billing_errors['cc_cvv'] = 'Please enter your CVV!';
	endif;

	if(preg_match('/^[A-Za-z0-9\',.# -]{2,160}$/', $_POST['cc_address'])):
		$cc_address = $_POST['cc_address'];
	else:
		$billing_errors['cc_address'] = "Please enter your street address!";
	endif;

	$pattern = "/^[A-Za-z\'.-]{2,60}$/";
	if(preg_match($pattern, $_POST['cc_city'])):
		$cc_city = addslashes($_POST['cc_city']);
	else:
		$billing_errors['city'] = "Please enter your city!";
	endif;
	
	$pattern = "/^[A-Z]{2}$/";
	if(preg_match($pattern, $_POST['cc_state'])):
		$cc_state = $_POST['cc_state'];
	else:
		$billing_errors['cc_state'] = "Please enter your state!";
	endif;
	
	$pattern = "/(^\d{5}$)|(^\d{5}-\d{4}$)/";
	if(preg_match($pattern, $_POST['cc_zip'])):
		$cc_zip = $_POST['cc_zip'];
	else:
		$shipping_errors['cc_zip'] = "Please enter your zip code!";
	endif;

	if(empty($billing_errors)):
		$cc_exp = sprintf('%02d%d', $_POST['cc_exp_month'], $_POST['cc_exp_year']);
		if(isset($_SESSION['order_id'])):
			$order_id = (int)$_SESSION['order_id'];
			$order_total = $_SESSION['order_total'];
		    if(isset($order_id, $order_total)):
		    	$customer_id = $_SESSION['customer_id'];
		    	require_once(BASE."includes/gateway_setup.php");
		    	require_once(BASE."includes/gateway_process.php");
		    	$reason = addslashes($response_array[3]);
		    	$response = implode(" ", $response_array);
		    	$amount = (int)$response_array[9];
		    	$type =  $data['x_type'];
		    	$response_code = (int)$response_array[0];
		    	$transaction_id = (int)$response_array[6];
		    	$query = "CALL add_transaction('$order_id', '$type', '$amount', '$response_code', '$reason', '$transaction_id', '$response')";
		    	$result = mysqli_query($dbc, $query);
		    	if($response_array[0] == "3"): 
		    		//This is not right 2 means declined, 3 means error, 4 means held for reveiw, 1 for alright 
		    		$_SESSION['response_code'] = $response_array[0];
		    		echo "<meta http-equiv = 'refresh' content ='5; url=/E-Commerce2/final'>";
		    	endif;
		    endif;
		else:
			$cc_last_four = substr($cc_number, -4);
			$result = mysqli_query($dbc, "CALL add_order({$_SESSION['customer_id']}, '$uid', {$_SESSION['shipping']}, $cc_last_four, @total, @oid)");
			if($result):
				$result = mysqli_query($dbc, 'SELECT @total, @oid');
				if(mysqli_num_rows($result) == 1):
					list($order_total, $order_id) = mysqli_fetch_array($result);
					$_SESSION['order_total'] = $order_total;
					$_SESSION['order_id'] = $order_id;
				else:
					unset($cc_number, $cc_cvv);
					trigger_error("Your order could not be processed due to a system error! We apologize for the incovenience.");
				endif;
			else:
				unset($cc_number, $cc_cvv);
				trigger_error("Your order could not be processed due to a system error! We apologize for the incovenience.");
			endif;
		endif;
	endif;
endif;
$page_title = "Coffee - Checkout - Your Billing Information";
$cur_page = "billing";
$result = mysqli_query($dbc, "CALL get_shopping_cart_contents('$uid')");
if(mysqli_num_rows($result) > 0):
	if(isset($_SESSION['shipping_for_billing']) && $_SERVER['REQUEST_METHOD'] != 'POST'):
		$values = 'SESSION';
	else:
		$values = 'POST';
	endif;
	require_once(BASE."views/billing.php");
else:
	require_once(BASE."views/emptycart.php");
endif;
require_once(BASE."includes/checkout_template.php");