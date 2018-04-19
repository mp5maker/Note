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
					<img src = '/E-Commerce2/images/".$row['g_image']."' width = '100' height = '100'/>
					<p class = 'card-text'>".$row['g_description']."</p>
				</div>
			</div>
		";
		$header = true;
	endif;
		$sale_price = "";
		if(($row['sale_price'] < $row['price']) && $row['sale_price'] != NULL):
			$sale_price = "
				<del>Price: $".($row['price']/100)."</del>&nbsp;
				<strong> Sale: $".($row['sale_price']/100).".00 </strong>
			";
		else:
			$sale_price = "
				<strong>Price: $".($row['price']/100)."</strong>&nbsp;
			";
		endif;
		$content .= "
			<div class = 'row ml-2 mt-2 mr-2 card'>
				<div class = 'col card-body'>
					<h5 class = 'card-title'><strong>".$row['name']."</strong></h5>
					<img src = '/E-Commerce2/images/".$row['image']."' width = '100' height = '100'/>
					<p class = 'card-text'>".$row['description']."</p>".
					"<h4 class = 'card-text'>
						 $sale_price 
					</h4>".
					"<h4 class = 'card-text'> Availability: 
						<span class = 'badge badge-pill border text-info'>".
							get_stock_status($row['stock']). 
						"</span>
					</h4>".
					"<p>
						<a href = '/E-Commerce2/cart/".$row['sku']."/add' class = 'card-link'>
						<i class = 'icon-shopping-cart'></i>
						Add to cart
					</a>".
					"</p>
				</div>
			</div>
		";
endwhile;