<?php
$content = "
<div class = 'ml-2 mt-2 mr-2 row'>  
	<h1> Shopping Cart </h1>
	<p class = 'text-info'>
		Please use this form to update your shopping cart. 
		You may change the quantities, move items to your wish list
		for future purchasing, or remove items entirely. The shipping 
		and handling cost is based upon the order total. When you are
		ready to complete your purchase, please click <kbd> Checkout </kbd>
		to be taken to a secure page for processing. 
	</p>
</div>

<form action = '/E-Commerce2/cart' method = 'post' class = 'ml-2 mt-2 mr-2'>
	<table class = 'table table-responsive-sm table-hover'>
		<thead class = 'thead-light'>
			<tr>
				<th>Item</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Subtotal</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
";
$total = 0;
while($row = mysqli_fetch_array($result)):
$price = ($row['price']/100);
if(($row['sale_price'] < $row['price']) && $row['sale_price'] != NULL):
	$price = ($row['sale_price']/100);
endif;
$subtotal = $price * $row['quantity'];
$content .= "
			<tr>
				<td>".$row['category']."::".$row['name']."</td>
				<td>
					<input type = 'text' name = 'quantity[".$row['sku']."]'
						   value = '".$row['quantity']."' size = '2'/>
				</td>
				<td>$".$price."</td>
				<td>$".number_format($subtotal, 2)."</td>
				<td>
					<a href = '/E-Commerce2/wishlist/".$row['sku']."/move/".$row['quantity']."' class = 'badge border badge-success'>
						Move to Wishlist
					</a>	
					<a href = '/E-Commerce2/cart/".$row['sku']."/remove' class = 'badge border badge-danger'>
						Remove from Cart
					</a>
				</td>
			</tr>
";
if($row['stock'] < $row['quantity']):
	$content .=  "
			<td colspan = '5' class = 'text-danger'>
				There are only ".$row['stock']." left in the stock of the ".$row['name']."
				Please update the quantity, remove the item entirely, or move it to your wish list
			</td>
	";	
endif;

$total += $subtotal;
endwhile;

$content .=  "
			<tr>
				<td colspan = '3' class = 'text-dark'>
					<strong class = 'text-info'> 
						Shipping & Handling 
					</strong>
				</td>
				<td class = 'text-info'>
					<strong>$".get_shipping($total)."<strong>
				</td>
				<td>
					&nbsp;
				</td>
			</tr>
";


$total += get_shipping($total);
$content .=  "
			<tr>
				<td colspan = '3' class = 'text-dark'>
					<strong class = 'text-primary'> Total </strong>
				</td>
				<td>
					<strong class = 'text-primary'>$".number_format($total,2)."</strong>
				</td>
				<td>
					&nbsp;
				</td>
			</tr>
";

$content .= "
		</tbody>
	</table>
	<input type = 'submit' class = 'btn btn-success' value = 'Update Quantities'/>
	<a href = '/E-Commerce2/checkout/".$uid."' class = 'btn btn-warning'>Checkout</a>
</form>
";
?>
