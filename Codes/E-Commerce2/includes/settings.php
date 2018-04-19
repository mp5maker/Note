<?php 
$nav_lists = [
					 ['name' => 'Home', 'src' => '/E-Commerce2/home', 'icon' => 'icon-home'],
					 ['name' => 'Coffee', 'src' => '/E-Commerce2/shop/coffee', 'icon' => 'icon-coffee'],
					 ['name' => 'Goodies', 'src' => '/E-Commerce2/shop/goodies', 'icon' => 'icon-gift'],
					 ['name' => 'Sales', 'src' => '/E-Commerce2/sales', 'icon' => 'icon-tags'],
					 ['name' => 'Wishlist', 'src' => '/E-Commerce2/wishlist', 'icon' => 'icon-star'],
					 ['name' => 'Cart', 'src' => '/E-Commerce2/cart', 'icon' => 'icon-shopping-cart'],
					 ['name' => 'Mail', 'src' => '/E-Commerce2/mail', 'icon' => 'icon-envelope'],
					 ['name' => 'Map', 'src' => '/E-Commerce2/map', 'icon' => 'icon-map-marker']

];

$logo = ['src' => '/E-Commerce2/images/logo.png'];
$index = ['url' => '/E-Commerce2/'];


if(isset($_GET['navlist']) && $_GET['navlist'] == true):
	echo json_encode($nav_lists);
endif;

if(isset($_GET['logo']) && $_GET['logo'] == true):
	echo json_encode($logo);
endif;

if(isset($_GET['index']) && $_GET['index'] == true):
	echo json_encode($index);
endif;
?>