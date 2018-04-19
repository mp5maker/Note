<?php 
$content = "
	<div class = 'row mt-2 ml-2 mb-2 mr-2'>
		<div class = 'col'>
			<h1> Add Inventory</h1>
			<a href = '/E-Commerce2/admin/' class = 'nounderline'> 
			<i class = 'icon-chevron-sign-left'></i>
				Go Back to Admin Page 
			</a>
			<form method = 'post' action = '/E-Commerce2/admin/add_inventory.php'>
				<p><code>Indicate how many additional quantity of each product should be added to the inventory</code></p>
				<table class = 'table table-responsive-sm'>
					<thead>
						<tr>
							<th>Item</th>
							<th>Normal Price</th>
							<th>Quantity in Stock</th>
							<th>Add</th>
						</tr>
					</thead>
					<tbody>
	";
$query = "(SELECT CONCAT('G', ncp.id) AS sku, ncc.category, ncp.name, ncp.price AS price, ncp.stock 
		   FROM non_coffee_products AS ncp 
		   INNER JOIN non_coffee_categories AS ncc 
		   ON ncc.id=ncp.non_coffee_category_id 
		   ORDER BY category, name) 
		   UNION 
		   (SELECT CONCAT('C', sc.id), gc.category, CONCAT_WS(' - ', s.size, sc.caf_decaf, sc.ground_whole), sc.price , sc.stock 
		   FROM specific_coffees AS sc 
		   INNER JOIN sizes AS s 
		   ON s.id=sc.size_id 
		   INNER JOIN general_coffees AS gc 
		   ON gc.id=sc.general_coffee_id 
		   ORDER BY sc.general_coffee_id, sc.size_id, sc.caf_decaf, sc.ground_whole)";
$result = mysqli_query($dbc, $query);

while($row = mysqli_fetch_array($result)):
	$content .= "
		<tr>
			<td>".$row['category']."::".$row['name']."</td>
			<td>".$row['price']."</td>
			<td>".$row['stock']."</td>
			<td>
				<input type = 'text' name = 'add[".$row['sku']."]'/>
			</td>
		</tr>
	";
endwhile;

$content .= "

					</tbody>
				</table>
				<input type = 'submit' value = 'Add the Inventory' class = 'btn btn-success'/>
			</form>
			";

if(isset($success)):
	$content .= "
				<p class = 'text-success'>".$success."</p>
				";
endif;

$content .= "			
		</div>
	</div>
		";