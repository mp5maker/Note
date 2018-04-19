<?php 
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce2/includes/config.php");
require_once(BASE."admin/includes/admin_info.php");

if(isset($_SESSION['user_admin']) && isset($_SESSION['user_admin_pass'])):
	if(($_SESSION['user_admin'] == USER) && ($_SESSION['user_admin_pass'] == PASS)):
		$page_title = "View All Orders";
		$cur_page = "Orders";
		require_once(MYSQL);
		require_once(BASE."admin/views/view_orders.php");
	else:
		require_once(BASE."admin/views/admin_error.php");
	endif;
else:
	require_once(BASE."admin/views/admin_error.php");
endif;
require_once(BASE."includes/template.php");