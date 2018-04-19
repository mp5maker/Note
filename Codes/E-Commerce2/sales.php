<?php
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce2/includes/config.php");
$page_title = "Sale Items";
$cur_page = "Sales";
$category = "Sales";
require_once(MYSQL);
$result = mysqli_query($dbc, "CALL select_sale_items(true)");
if(mysqli_num_rows($result) > 0):
	require_once(BASE."views/list_sales.php");
else:
	require_once(BASE."views/noproducts.php");
endif;
require_once(BASE."includes/template.php");