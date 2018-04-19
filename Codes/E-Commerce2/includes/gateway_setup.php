<?php 
$data = array();

$data['x_type'] = 'AUTH_ONLY';
$data['x_card_num'] = $cc_number;
$data['x_card_code'] = $cc_exp;
$data['x_first_name'] = $cc_first_name;
$data['x_last_name'] = $cc_last_name;
$data['x_address'] = $cc_address;
$data['x_state'] = $cc_state;
$data['x_city'] = $cc_city;
$data['x_zip'] = $cc_zip;