<?php
$content = "
	<div class = 'row m-2'>
		<div class = 'col'>
			<h3> View an Order </h3>
			<a href = '/E-Commerce2/admin/' class = 'nounderline'> 
				<i class = 'icon-chevron-sign-left'></i>
				Go Back to Admin Page 
			</a>
				<p> 
					<code>Order ID: </code>
					".$order_id."
				</p>
				<p> 
					<code>Total: </code>
					$".$row['total']."
				</p>
				<p> 
					<code>Shipping: </code>
					$".$row['shipping']."
				</p>
				<p> 
					<code>Order Date: </code>
					".$row['od']."
				</p>
				<p> 
					<code>Customer Name: </code>
					".$row['name']."
				</p>
				<p> 
					<code>Customer Address: </code>
					".$row['address']."
				</p>
				<p> 
					<code>Customer Email: </code>
					".$row['email']."
				</p>
				<p> 
					<code>Customer Phone: </code>
					".$row['phone']."
				</p>
				<p> 
					<code>Credit Card Number</code>
					".$row['credit_card_number']."
				</p>
		<table class = 'table table-responsive'>
			<thead>
				<tr>
					<th> Item </th>
					<th> Price Paid </th>
					<th> Price Quantity in Stock </th>
					<th> Price Quantity in Ordered </th>
					<th> Ship? </th>
				</tr>
			</thead>
			<tbody>
		";
$shipped = true;

do{
$content .= "
			<tr>
				<td>".$row['item']."</td>
				<td>".$row['price_per']."</td>
				<td>".$row['stock']."</td>
				<td>".$row['quantity']."</td>
				<td>".$row['sd']."</td>
			</tr>
			";
if(!$row['sd']):
	$shipped = false;
endif;
}while($row = mysqli_fetch_array($result));

$content .= "
				</tbody>
			</table>
			";

if(!$shipped):
	$content .= "
			<p class = 'text-danger'>
				Note that actual payments will be collected once you click this button 
			</p>
			<form action = '/E-Commerce2/admin/view_order.php' method = 'post'>
				<input type = 'submit' value = 'Ship This Order' class = 'btn btn-success'/>
			</form>
	";
endif;

$content .= "
		</div>
	</div>
";