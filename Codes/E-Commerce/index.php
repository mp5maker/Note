<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/config.inc.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/header.php');
require_once(MYSQL);
require($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/form_functions.inc.php');
// $_SESSION['user_id'] = 1;
// $_SESSION['user_type'] = 'admin';

echo '<div class = "row page">';
echo '<div class = "col-10 content my-2">';
echo '<h3 class = "pl-2"> Welcome </h3>';
echo '	<p class = "pl-2"> Welcome to Knowledge is Power, a site dedicated to keeping you up to date';
echo '		on the Web security and progamming information you need know </p>';
echo'</div>';
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/body.php");
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/footer.php");
?>




