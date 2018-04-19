<?php
require_once(BASE."/includes/product_status.php");
$content = "
		 <h1 class = 'ml-2 mt-2'> Current Sale Items </h1><br/>
		<div class = 'row ml-2 mt-2'>
	";

while($row = mysqli_fetch_array($result)):
$sale_price = "";
		if(($row['sale_price'] < $row['price']) && $row['sale_price'] != NULL):
			$sale_price = "
				<del>Price: $".($row['price']/100)."</del>&nbsp;
				<strong> Sale: $".($row['sale_price']/100)."</strong>
			";
		else:
			$sale_price = "
				<strong>Price: $".($row['price']/100)."</strong>&nbsp;
			";
		endif;
$content .= "
			<div class = 'thumbnail mr-2 card'>
				<img src = '/E-Commerce2/images/".$row['image']."' class = 'img-thumbnail img-responsive' height = '100' width = '100'/>
				<div class = 'caption'>
				 	<p>".$row['description']."</p>
				 	<h3>
				 		$sale_price
				 	</h3>
				 	<h4> Availability: 
						<span class = 'badge badge-pill border text-info'>".
							get_stock_status($row['stock']). 
						"</span>
					</h4>
					<p>
						<a href = '/E-Commerce2/cart/".$row['sku']."/add' class = 'card-link'>
							<i class = 'icon-shopping-cart'></i>
							Add to cart
						</a>
					</p>
				</div>
			</div>
			";
endwhile;

$content .=	"
		</div>
		";