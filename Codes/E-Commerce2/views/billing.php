<?php
$pages = ['shipping', 'billing', 'completion'];
$content = "
	<div class = 'row mt-2 ml-2 mr-2'>
		<nav class = 'col' aria-label = 'breadcrumb'>
		  <h1>Checkout</h1>
		  <ol class = 'breadcrumb'>
	";
foreach($pages as $page):
	if($page == $cur_page):
		$content .= "	  
				    <li class = 'breadcrumb-item active text-success'>
				    		".ucfirst($page)."
				    </li>
				   ";
    else:
   		$content .= "	  
				    <li class = 'breadcrumb-item'>
				    		".ucfirst($page)."
				    </li>
				   ";
	endif;
endforeach;
$content .= "        
		  </ol>
		</nav>
	</div>

	";
require_once(BASE."includes/product_status.php");
require_once(BASE."includes/form_functions.php");
require_once(BASE."views/checkout_cart.php");

$content .= "
	<div class = 'row mt-2 ml-2 mr-2'>
		<div class = 'col'>
			<h2> Your Shipping Information </h2>
			<code> CC stands for Credit Card </code>
			<form action = '/E-Commerce2/billing.php' method = 'post'>
				".create_form_input('cc_number','text', $billing_errors, 'POST', 'autocomplete = "off"')."
				".create_form_input('cc_exp_month','select', $billing_errors, 'POST', 'autocomplete = "off"')."
				".create_form_input('cc_exp_year','select', $billing_errors, 'POST', 'autocomplete = "off"')."
				".create_form_input('cc_cvv','text', $billing_errors, 'POST', 'autocomplete = "off"')."
				".create_form_input('cc_first_name','text', $billing_errors, 'POST', 'autocomplete = "off"')."
				".create_form_input('cc_last_name','text', $billing_errors, 'POST', 'autocomplete = "off"')."
				".create_form_input('cc_address','text', $billing_errors, 'POST', 'autocomplete = "off"')."
				".create_form_input('cc_state','select', $billing_errors, 'POST', 'autocomplete = "off"')."
				".create_form_input('cc_city','text', $billing_errors, 'POST', 'autocomplete = "off"')."
				".create_form_input('cc_zip','text', $billing_errors, 'POST', 'autocomplete = "off"')."
				<input type = 'submit' value = 'Place Order' class = 'btn btn-success mb-2'/>
				<h6 class = 'text-danger'>By clicking this button, your order will be completed and your credit card will be charged</h6>
			</form>
		</div>
	</div>
";