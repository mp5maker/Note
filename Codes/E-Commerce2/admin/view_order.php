<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce2/includes/config.php");
require_once(BASE."admin/includes/admin_info.php");

if(isset($_SESSION['user_admin']) && isset($_SESSION['user_admin_pass'])):
	if(($_SESSION['user_admin'] == USER) && ($_SESSION['user_admin_pass'] == PASS)):
		if(isset($_GET['oid']) && filter_var($_GET['oid'], FILTER_VALIDATE_INT, ['min_range' => 1])):
			$_SESSION['order_id'] = $_GET['oid'];
			$order_id = $_GET['oid'];
			$page_title = "Order";
			$cur_page = "Orders";
			require_once(MYSQL);
			$query = "SELECT FORMAT(total/100, 2) AS total, 
					  FORMAT(shipping/100,2) AS shipping, credit_card_number, 
					  DATE_FORMAT(order_date, '%a %b %e, %Y at %h:%i%p') AS od, 
					  email, CONCAT(last_name, ', ', first_name) AS name, 
					  CONCAT_WS(' ', address1, address2, city, state, zip) AS address, 
					  phone, customer_id, CONCAT_WS(' - ', ncc.category, ncp.name) AS item,
					  ncp.stock, quantity, FORMAT(price_per/100,2) AS price_per, 
					  DATE_FORMAT(ship_date, '%b %e, %Y') AS sd 
					  FROM orders AS o 
					  INNER JOIN customers AS c 
					  ON (o.customer_id = c.id) 
					  INNER JOIN order_contents 
					  AS oc ON (oc.order_id = o.id) 
					  INNER JOIN non_coffee_products AS ncp
					  ON (oc.product_id = ncp.id AND oc.product_type='goodies') 
					  INNER JOIN non_coffee_categories AS ncc 
					  ON (ncc.id = ncp.non_coffee_category_id) 
					  WHERE o.id= '$order_id'
					  UNION 
					  SELECT FORMAT(total/100, 2), FORMAT(shipping/100,2), credit_card_number, 
					  DATE_FORMAT(order_date, '%a %b %e, %Y at %l:%i%p'), email, 
					  CONCAT(last_name, ', ', first_name), CONCAT_WS(' ', address1, address2, city, state, zip), phone, customer_id, 
					  CONCAT_WS(' - ', gc.category, s.size, sc.caf_decaf, sc.ground_whole) AS item, 
					  sc.stock, quantity, FORMAT(price_per/100,2), DATE_FORMAT(ship_date, '%b %e, %Y') 
					  FROM orders AS o 
					  INNER JOIN customers AS c 
					  ON (o.customer_id = c.id) 
					  INNER JOIN order_contents AS oc 
					  ON (oc.order_id = o.id) 
					  INNER JOIN specific_coffees AS sc 
					  ON (oc.product_id = sc.id AND oc.product_type='coffee') 
					  INNER JOIN sizes AS s 
					  ON (s.id=sc.size_id) 
					  INNER JOIN general_coffees AS gc 
					  ON (gc.id=sc.general_coffee_id) 
					  WHERE o.id= '$order_id'
			";
			$result = mysqli_query($dbc, $query);
			if(mysqli_num_rows($result) > 0):
				$row = mysqli_fetch_array($result);
				require_once(BASE."admin/views/view_order.php");
			endif;
		endif;
		if($_SERVER['REQUEST_METHOD'] == 'POST'):
			require_once(MYSQL);
			$order_id = $_SESSION['order_id'];
			$query = "SELECT customer_id, total, transaction_id 
					  FROM orders as o
					  JOIN transactions AS t 
					  ON o.id = t.order_id AND t.type = 'AUTH_ONLY' 
					  AND t.response_code = 3
					  WHERE o.id = '$order_id'";
			$result = mysqli_query($dbc, $query);
			if(mysqli_num_rows($result) == 1):
				list($customer_id, $order_total, $trans_id) = mysqli_fetch_array($result, MYSQLI_NUM);
			endif;
			if($order_total > 0):
	    		$query = "UPDATE order_contents SET ship_date = NOW() WHERE order_id = '$order_id'";
	    		$result = mysqli_query($dbc, $query);
	    		$query = "UPDATE specific_coffees AS sc, order_contents AS oc 
	    				  SET sc.stock = sc.stock-oc.quantity
	    				  WHERE sc.id = oc.product_id 
	    				  AND oc.product_type = 'coffee'
	    				  AND oc.order_id = '$order_id'";
	    		$result = mysqli_query($dbc, $query);
	    		$query = "UPDATE non_coffee_products AS ncp, order_contents AS oc 
	    				  SET ncp.stock = ncp.stock-oc.quantity
	    				  WHERE ncp.id = oc.product_id 
	    				  AND oc.product_type = 'goodies'
	    				  AND oc.order_id = '$order_id'";
	    		$result = mysqli_query($dbc, $query);
	    		$message = "The payment has been made. The order has been shipped!.";
				require_once(BASE."admin/views/shipping.php");
		    else:
		    	$error = "The order total ${$order_total} is invalid.";
			endif;
		endif;	
	else:
		require_once(BASE."admin/views/admin_error.php");
	endif;
endif;
require_once(BASE."includes/template.php");