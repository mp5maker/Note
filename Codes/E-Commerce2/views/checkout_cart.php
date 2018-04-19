<?php
$content .= "
<div class = 'ml-2 mt-2 mr-2 row'>
	<div class = 'col'>
		<table class = 'table table-responsive-sm table-hover'>
			<thead class = 'thead-light'>
				<tr>
					<th>Item</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
";
$total = 0;
$remove = array();
while($row = mysqli_fetch_array($result)):
$price = ($row['price']/100);
if(($row['sale_price'] < $row['price']) && $row['sale_price'] != NULL):
	$price = ($row['sale_price']/100);
endif;
$subtotal = $price * $row['quantity'];
if($row['stock'] < $row['quantity']):
	$content .=  "
			<td colspan = '4' class = 'text-danger'>
				There are only ".$row['stock']." left in the stock of the ".$row['name']."
				This item has been removed from your cart and placed in your wish list.
			</td>
	";
	$remove[$row['sku']] = $row['quantity'];
else:	
	$content .= "
				<tr>
					<td>".$row['category']."::".$row['name']."</td>
					<td>
						<input type = 'text' name = 'quantity[".$row['sku']."]'
							   value = '".$row['quantity']."' size = '2'/>
					</td>
					<td>$".$price."</td>
					<td>$".number_format($subtotal, 2)."</td>
				</tr>
	";
endif;

$total += $subtotal;
endwhile;

$content .=  "
			<tr>
				<td colspan = '2' class = 'text-dark'>
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
$_SESSION['shipping'] = get_shipping($total);
$content .=  "
			<tr>
				<td colspan = '2' class = 'text-dark'>
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
if(!empty($remove)):
	mysqli_next_result($dbc);
	foreach($remove as $sku => $qty):
		list($type, $pid) = parse_sku($sku);
		$result = mysqli_multi_query($dbc, "CALL add_to_wish_list('$uid','$type','$pid','$qty')
										    CALL remove_from_cart('$uid','$type','$pid','$qty')");
	endforeach;
endif;

$content .= "
		</tbody>
	</table>
  </div>
</div>
";
?>
