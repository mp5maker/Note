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

$content .= "
	<div class = 'row mt-2 ml-2 mr-2'>
		<div class = 'col'>
			<h2> Your Order is Complete </h2>
			<p> Thank you for your order 
				<code> # ".$_SESSION['order_id']."</code>
			</p>
			<p>
				<strong> Please use this email to correspondence with us. </strong>
			</p>
			<p class = 'text-success'>
				A charge of $".($_SESSION['order_total']/100)." will appear on your credit card when the order ships. 
				All orders are processed on the next business days. You will be contacted in case of any delays.
			</p>
			<p class = 'text-primary'>
				An email confirmation has been sent to your email address.
			</p>
		</div>
	</div>
";