<?php
function get_stock_status($stock){
	if($stock > 4):
		return 'In Stock';
	elseif($stock <= 4):
		return 'Low Stock';
	elseif($stock == 0):
		return 'Out of Stock';
	endif;
}

function get_price($type, $regular, $sales){
	if($type == 'coffee'):
		if((0 < $sales) && ($sales < $regular)):
			return $sales;
		else:
			return $regular;
		endif;
	elseif($type == 'goodies'):
		if((0 < $sales) && ($sales < $regular)):
			return $sales;
		else:
			return $regular;
		endif;
	endif;
}

function get_just_price($regular, $sales){
	if($sales != NULL):
		if($sales < $regular):
			return number_format($sales,2);
		else:
			return number_format($regular,2);
		endif;
	else:
		return number_format($regular,2);
	endif;
}

function parse_sku($sku){
	$type_abbr = substr($sku, 0, 1);
	$pid = substr($sku, 1);
	if($type_abbr == 'C'):
		$type = 'coffee';
	elseif($type_abbr == 'G'):
		$type = 'goodies';
	else:
		$type = NULL;
	endif;
	$pid = (filter_var($pid, FILTER_VALIDATE_INT, ['min_range' => 1]))? $pid : NULL;
	return [$type, $pid];
}

function get_shipping($total = 0){
	$shipping = 3;
	if($total < 10):
		$rate = 0.25;
	elseif($total < 20):
		$rate = 0.20;
	elseif($total < 50):
		$rate = 0.18;
	elseif($total < 100):
		$rate = 0.16;
	else:
		$rate = 0.15;
	endif;
	$shipping = $shipping + ($total*$rate);
	return number_format($shipping,2);
}