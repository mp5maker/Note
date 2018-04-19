<?php
if($live):
	define('GATEWAY_API_URL', 'https://secure.authorize.net/gateway/transact.dll');
else:
	define('GATEWAY_API_URL', 'https://test.authorize.net/gateway/transact.dll');
endif;
$data['x_login'] = '2q2m4gXEkmW';
$data['x_tran_key'] = '379B4N2Afnp3Q2HU';
$data['x_delim_data'] = 'TRUE';
$data['x_delim_char'] = '|';
$data['x_relay_response'] = 'FALSE';
$data['x_method'] = 'CC';
$data['x_amount'] = $order_total;
$data['x_invoice_num'] = $order_id;
$data['x_cust_id'] = $customer_id;

$post_string = '';
foreach($data as $k => $v):
	$post_string .= "$k=".urlencode($v)."&";
endforeach;

$post_string = rtrim($post_string, '& ');
$request = curl_init(GATEWAY_API_URL);
curl_setopt($request, CURLOPT_HEADER, 0);
curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($request, CURLOPT_POSTFIELDS, $post_string);
curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE);

$response = curl_exec($request);
curl_close($request);
$response_array = explode($data['x_delim_char'], $response);