<?php
require_once(BASE."includes/product_status.php");
$content = '';
$header = false;
while($row = mysqli_fetch_array($result)):
	if(!$header):
		$content .= "
			<div class = 'row ml-2 mt-2 mr-2 card'>
				<div class = 'col card-body'>
					<h1 class = 'card-title'>".$category."</h1>
					<img src = '/E-Commerce2/images/".$row['image']."' width = '100' height = '100'/>
					<p class = 'card-text'>".$row['description']."</p>
		";
		$content .= "
					<form action = '/E-Commerce2/cart.php' method = 'get' class = 'form-inline'>
						<div class = 'form-group'>
							<input type = 'hidden' class = 'form-control' name = 'action' value = 'add'/> 
						</div>
						<div class = 'form-group'>
							<select name = 'sku' class = 'form-control'>
					";
		$header = true;
	endif;
						$sale_price = "";
						if(($row['sale_price'] < $row['price']) && $row['sale_price'] != NULL):
							$sale_price = "Sale: $".($row['sale_price']/100).".00";
						endif;
					 	$content .= "
					 			<option value = '".$row['sku']."'>
					 				".$row['name']." $sale_price
					 			</option>
					 	";
endwhile;
		$content .= "
							</select>
						</div>
						<input type = 'submit' class = 'btn btn-success icon-shopping-cart ml-3' value = '&#xf07a; Add to Cart'/>
					</form>
				</div>
			</div>
		";
