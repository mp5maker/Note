<?php 
$data = array();

$data['x_type'] = 'PRIOR_AUTH_CAPTURE';
$data['x_trans_id'] = $trans_id;
$data['x_amount'] = $order_total;
$data['x_invoice_num'] = $order_id;
$data['x_cust_id'] = $customer_id;