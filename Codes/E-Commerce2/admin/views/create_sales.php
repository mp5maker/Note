<?php
$content = "
<div class = 'row m-2'>
		<div class = 'col'>
			<h1> Create Sales </h1>
			<a href = '/E-Commerce2/admin/' class = 'nounderline'> 
				<i class = 'icon-chevron-sign-left'></i>
				Go Back to Admin Page 
			</a>
			<p class = 'text-info'>
				To marke an item as bein on sale, indicate the sale price, the date 
				sake starts, and the date the sale ends. You may leave the end date blank, 
				thereby creating an open-ended sale. Only the currently stocked
				products are listed below!
			</p>
			<form action = '/E-Commerce2/admin/create_sales.php' method = 'post'>
				<table class = 'table table-responsive'>
					<thead>
						<tr>
							<th>Item</th> 
							<th>Nromal Price</th> 
							<th>Quantity in Stock</th> 
							<th>Sale Price</th> 
							<th>Start Date</th> 
							<th>End Date</th> 
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
				<input type = 'text' name = 'sale_price[".$row['sku']."]'/>
			</td>
			<td>
				<input type = 'date'  name = 'start_date[".$row['sku']."]'/>
			</td>
			<td>
				<input type = 'date'  name = 'end_date[".$row['sku']."]'/>
			</td>
		</tr>
	";
endwhile;

$content .= "			
					</tbody>
				</table>
				<input type = 'submit' value = 'Add these Sales' class = 'btn btn-success'/>
			</form>
			";

if(isset($success)):
	$content .= "<p class = 'text-success'>".$success."</p>";
endif;

$content .= "
		</div>
</div>
";