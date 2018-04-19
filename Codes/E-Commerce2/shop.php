<?php
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce2/includes/config.php");

if(isset($_GET['type']) && $_GET['type'] == 'goodies'):
	$page_title = "Our Goodies, by Category";
	$type = 'goodies';
	$cur_page = 'Goodies';
else:
	$page_title = "Our Coffee Products";
	$type = "coffee";
	$cur_page = 'Coffee';
endif;

require_once(BASE."includes/mysqli.php");
$result = mysqli_query($dbc, "CALL select_categories('$type')");

if(!$result):
	echo mysqli_error($dbc);
endif;

if(mysqli_num_rows($result) >= 1):
	require_once(BASE."views/list_categories.php");
else:
	require_once(BASE."views/error.php");
endif;

require_once(BASE."includes/template.php");