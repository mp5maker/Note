<?php
require_once($_SERVER['DOCUMENT_ROOT']."/cafe/includes/config.php");
$page_title = 'Menu';
$content = file_get_contents(BASE."/cafe/views/menu.php");
require_once(BASE."/cafe/includes/template.php");