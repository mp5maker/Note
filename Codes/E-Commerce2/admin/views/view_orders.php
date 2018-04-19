<?php
$content = "
	<div class = 'row m-2'>
		<div class = 'col'>
			<h3> View Orders </h3>
			<a href = '/E-Commerce2/admin/' class = 'nounderline'> 
				<i class = 'icon-chevron-sign-left'></i>
				Go Back to Home Page 
			</a>
			<table class = 'table table-responsive-hover'>
				<thead>
					<tr>
						<th>Order ID</th> 
						<th>Total</th> 
						<th>Customer Name</th> 
						<th>City</th> 
						<th>State</th> 
						<th>Zip</th> 
						<th>Left to Ship</th>
					</tr> 
				</thead>
				<tbody>
		";
//Response code should be 1 but overhere using it as 3
$query = "SELECT o.id, total, c.id AS cid, 
		  CONCAT(last_name, ',', first_name) AS name, 
		  city,state,zip, COUNT(oc.id) AS items
		  FROM orders AS o 
		  LEFT OUTER JOIN order_contents AS oc 
		  ON (oc.order_id = o.id AND oc.ship_date IS NULL)
		  JOIN customers AS c ON (o.customer_id = c.id)
		  JOIN transactions AS t 
		  ON (t.order_id = o.id AND t.response_code = 3)
		  GROUP BY o.id DESC";

$result = mysqli_query($dbc, $query);
while($row = mysqli_fetch_array($result)):
	$content .= "
		<tr>
			<td>
				<a href = '/E-Commerce2/admin/view_order.php?oid=".$row['id']."'>
					".$row['id']."
				</a>
			</td>
			<td>
			 	".$row['total']."
			</td>
			<td>
				".$row['name']."
			</td>
			<td>
			 	".$row['city']."
			</td>
			<td>
			 	".$row['state']."
			</td>
			<td>
			 	".$row['zip']."
			</td>
			<td>
			 	".$row['items']."
			</td>
		</tr>

	";
endwhile;

$content .= "
				</tbody>
			</table>
		</div>
	</div>
";