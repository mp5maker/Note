<?php
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce2/includes/config.php");
session_start();
$uid = session_id();
if(!isset($_SESSION['customer_id'])):
	echo "<meta http-equiv = 'refresh' content ='5; url=/E-Commerce2/checkout'>";
	// Techinically response code should be 1 not 3 (Since card is invalid)
	exit();
elseif(!isset($_SESSION['response_code']) && $_SESSION['response_code']!= 3):
	echo "<meta http-equiv = 'refresh' content ='5; url=/E-Commerce2/billing'>";
	exit();
endif;

require(MYSQL);
$result = mysqli_query($dbc, "CALL clear_cart('$uid')");
$page_title = 'Coffee-Checkout- Your Order is Complete';
$cur_page = "completion";
require_once(BASE."includes/email_receipt.php");
require_once(BASE."views/final.php");
require_once(BASE."includes/checkout_template.php");
$_SESSION = array();
session_destroy();
