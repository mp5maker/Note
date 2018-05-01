<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/cafe/includes/config.php");
$errors = array();
$messages = array();
$page_title = 'Contact Us';
require_once(BASE."/cafe/admin/includes/validator.php");
require_once(BASE."/cafe/includes/send_email.php");
require_once(BASE."/cafe/admin/includes/create_form.php");
require_once(BASE."/cafe/views/contact_us.php");
require_once(BASE."/cafe/includes/template.php");