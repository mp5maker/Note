<?php
require_once($_SERVER['DOCUMENT_ROOT']."/cafe/includes/config.php");
$page_title = 'Home';
$content = file_get_contents(BASE."/cafe/views/home.php");
require_once(BASE."/cafe/includes/template.php");