<?php
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce2/includes/config.php");
require_once(BASE."includes/mysqli.php");
$page_title = "Home";
$cur_page = "Home";
require_once(MYSQL);
$result = mysqli_query($dbc, "CALL select_sale_items(false)");
require_once(BASE."views/home.php");
require_once(BASE."includes/template.php");