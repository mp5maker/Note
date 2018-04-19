<?php
require_once(BASE."includes/form_functions.php");

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
	<div class = 'row mt-2 ml-2 mr-2'>
		<div class = 'col'>
			<h2> Your Shipping Information</h2>
			<p class = 'mt-0 mb-0'> 
				<code>
					Please enter your shipping information. On the next page, 
					you'll be able to enter you billing infromation and complete 
					the order.
				</code> 
			</p>
			<p class = 'mt-0 mb-0'> 
				<code>
					Please check the first box if your shipping 
					and billing addresses are the same.
				</code>
			</p>
			<span class = 'text-danger'> ** All Fields are Required ** </span> 
		</div>
	</div>
	<div class = 'row mt-2 ml-2 mr-2'>
		<form action = '/E-Commerce2/checkout.php' method = 'post' class = 'col'>
			<div class = 'form-group'>
				<input type = 'checkbox' name = 'use' value = 'Y' id = 'use' checked = 'checked'/>
				<label for = 'use'> Use Same Address </label>
			</div>
			".create_form_input('first_name','text', $shipping_errors)."
			".create_form_input('last_name','text', $shipping_errors)."
			".create_form_input('address1','text', $shipping_errors)."
			".create_form_input('address2','text', $shipping_errors)."
			".create_form_input('city','text', $shipping_errors)."
			".create_form_input('state','select', $shipping_errors)."
			".create_form_input('zip','text', $shipping_errors)."
			".create_form_input('phone','text', $shipping_errors)."
			".create_form_input('email','text', $shipping_errors)."
			<input type = 'submit' value = 'Continue onto Billing' class = 'btn btn-primary'/>
		</form>
	</div>
";