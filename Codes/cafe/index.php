<?php
require_once($_SERVER['DOCUMENT_ROOT']."/cafe/includes/config.php");
$page_title = 'Index';
$content = file_get_contents(BASE."/cafe/views/index.php");
require_once(BASE."/cafe/includes/template.php");