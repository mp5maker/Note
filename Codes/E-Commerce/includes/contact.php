<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/config.inc.php');
$page_title = "Contact";
require_once($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/header.php');
require_once(MYSQL);
require($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/form_functions.inc.php');
// $_SESSION['user_id'] = 1;
// $_SESSION['user_type'] = 'admin';

$body = '<h3 class = "pl-2"> Contact </h3>
	<p class = "pl-2"> Welcome to Knowledge is Power, a site dedicated to keeping you up to date on the Web security and programming information you need know </p>';
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/body.php");
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/footer.php");
?>

