<?php
/** Common */

//Website Data
$website = ["name" => "Marz's Cafe"];


//Navigation Data
$navigation = [
	['name' => 'Home', 'src' => '/cafe/home.php', 'icon' => 'icon-home'],
	['name' => 'Menu', 'src' => '/cafe/menu.php', 'icon' => 'icon-food'],
	['name' => 'Contact Us', 'src' => '/cafe/contact_us.php', 'icon' => 'icon-group']
]; 

//Logo Data
$logo = ['src' => '/cafe/img/marzia.gif', 'alt' => 'Logo'];

//Brand Data
$brand = ['src' => 'icon-coffee', 'alt' => 'Brand'];

//Footer Data
$year = date("Y");
$footer = ["copy" => "2010-{$year} Photon's Workshop. All Rights Reserved"];

//Get Website Name
if(isset($_GET['website'])):
	if($_GET['website'] == true):
		echo json_encode($website);
	endif;
endif;

//Get Logo
if(isset($_GET['logo'])):
	if($_GET['logo'] == true):
		echo json_encode($logo);
	endif;
endif;

//Get Brand
if(isset($_GET['brand'])):
	if($_GET['brand'] == true):
		echo json_encode($brand);
	endif;
endif;

//Get Navigation
if(isset($_GET['navigation'])):
	if($_GET['navigation'] == true):
		echo json_encode($navigation);
	endif;
endif;

//Get Footer
if(isset($_GET['footer'])):
	if($_GET['footer'] == true):
		echo json_encode($footer);
	endif;
endif;
/* ================================================================================= */
/** Index */

//About Us Description Data
$about = ["desc" => "Marz is a classic and timeless coffee house located in the heart of
	            Baily Road. We pride ourself on being social community meeting place.
	            Marz is the place for you to eat healthy and perform yoga."];

//Google Chart Data
$chartoptions = ["title" =>  "Why go to Marz's Cafe?", "is3D" => true];
$chartdata = [
				"cols" => [
					["id" => "", "label" => "Reason", "pattern" => "", "type" => "string"],
					["id" => "", "label" => "Percentage", "pattern" => "", "type" => "number"]
				],

				"rows" => [
					["c" => [["v" => 45, "f" => "Social Meet up"], ["v" => 45, "f" => "Social Meet up"]]],
					["c" => [["v" => 30, "f" => "Coffee"], ["v" => 30, "f" => "Coffee"]]],
					["c" => [["v" => 8, "f" => "Yoga"], ["v" => 8, "f" => "Yoga"]]],
					["c" => [["v" => 8, "f" => "Read Books"], ["v" => 8, "f" => "Read Books"]]],
					["c" => [["v" => 9, "f" => "Study"], ["v" => 9, "f" => "Study"]]],
				]
		];

//Notices Data
$notice = [
			'open' => '9:00 AM',
			'close' => '11:00 PM',
			'notice' => 'Construction Work',
			'description' => 'Please, be careful near the baily road!'
		];

//Quotes Data
$quote = [
	["quote" => "Science may never come up with a better office communication system than the coffee break", "name" => "Earl Wilson"],
	["quote" => "If it wasn't for the coffee, I'd have no identifiable personality whatsover", "name" => "David Letterman"]
];

//Services Data
$service1 = [
				["title" => "POWER", "desc" => "Laptop and internet facilities", "icon" => "icon-power-off"],
				["title" => "LOVE", "desc" => "Made Coffee with love for families and friends", "icon" => "icon-heart"],
				["title" => "JOB DONE", "desc" => "Printing and other facilities", "icon" => "icon-lock"]
			];
$service2 = [
				["title" => "GREEN", "desc" => "Using recycling products for the cups", "icon" => "icon-leaf"],
				["title" => "CERTIFIED", "desc" => "Food Inspection Certified", "icon" => "icon-certificate"],
				["title" => "HARD WORK", "desc" => "Contantly working hard to improve our customer service", "icon" => "icon-wrench"]
			];

//Portfolio Data
$portfolio = [
	['src' => '/cafe/img/photography.jpg', 'alt' => 'Coffee Photograph', 'title' => 'Photography', 'desc' => 'Yes, we support photography to enable creativity'],
	['src' => '/cafe/img/coffeeanimated.gif', 'alt' => 'Coffee Animated', 'title' => 'Artistic', 'desc' => 'We allow artists to enjoy the artwork'],
	['src' => '/cafe/img/coffeetype.jpg', 'alt' => 'Coffee Types', 'title' => 'Coffee Types', 'desc' => 'Yes, we consider our customer values to make new types of coffee']
];

//Location Data
$location = ["lat" => '23.740935399999998', "long" => "90.4122266"]; 

//Get About Us Description
if(isset($_GET['about'])):
	if($_GET['about'] == true):
		echo json_encode($about);
	endif;
endif;

//Get Chart Nam3
if(isset($_GET['chartoptions'])):
	if($_GET['chartoptions'] == true):
		echo json_encode($chartoptions);
	endif;
endif;

//Get Chart Data
if(isset($_GET['chartdata'])):
	if($_GET['chartdata'] == true):
		echo json_encode($chartdata);
	endif;
endif;

//Get Notices
if(isset($_GET['notice'])):
	if($_GET['notice'] == true):
		echo json_encode($notice);
	endif;
endif;

//Get Portfolio
if(isset($_GET['portfolio'])):
	if($_GET['portfolio'] == true):
		echo json_encode($portfolio);
	endif;
endif;

//Get Service 1
if(isset($_GET['service1'])):
	if($_GET['service1'] == true):
		echo json_encode($service1);
	endif;
endif;

//Get Service 2
if(isset($_GET['service2'])):
	if($_GET['service2'] == true):
		echo json_encode($service2);
	endif;
endif;

//Get Quotes
if(isset($_GET['quote'])):
	if($_GET['quote'] == true):
		echo json_encode($quote);
	endif;
endif;

//Get Location
if(isset($_GET['location'])):
	if($_GET['location'] == true):
		echo json_encode($location);
	endif;
endif;

/* ================================================================================= */
/** Home */

$home = ["title1" => "Welcome to our Coffee House!", 
		 "desc11" => "It is a classic and timeless coffee house located in the heart of Baily Road. We pride ourself on being social community meeting place. It is the place for you to eat and drink healthy ", 
		 "desc12" => "We're so glad you made it. Have a seat. Let me get you a fresh, hot cup o'Joe. Cream and Sugar? There you go. ", 
		 "title2" => "About Marz's Cafe", 
		 "desc2" =>  "Marz's Coffee has been selling coffee since 1991. For years, Marz's Cafe has been prominently supporting the web developers."];

$reason = [
	['src' => '/cafe/img/coffeespark.jpg', 'desc' => 'Spark the day with refreshment!'],
	['src' => '/cafe/img/coffeelove.jpg', 'desc' => 'Friend, family and the loved ones!'],
	['src' => '/cafe/img/coffeesplash.jpg', 'desc' => 'Remembering the good old times!']
];

$promotion = [
	['name' => 'Couple Platter', 'src' => '/cafe/img/platter.jpg', 'price' => '800', 'sale_price' => '500', 'desc' => 'Enjoy your lovely evening together!', 'date_start' =>  '12-Sep-18', 'date_end' => '9-Nov-18'],
	['name' => 'Pizza Festa', 'src' => '/cafe/img/pizzabuffet.jpeg', 'price' => '1000', 'sale_price' => '700', 'desc' => 'Madness will start up your hunger!', 'date_start' =>  '30-Aug-18', 'date_end' => '12-Sep-18'],
	['name' => 'Coffee Brain', 'src' => '/cafe/img/coffeebuffet.jpg', 'price' => '2500', 'sale_price' => '2000', 'desc' => 'Hyper Active?', 'date_start' =>  '30-Jun-18', 'date_end' => '30-Aug-18']
];

//Get Home
if(isset($_GET['home'])):
	if($_GET['home'] == true):
		echo json_encode($home);
	endif;
endif;

//Get Reason
if(isset($_GET['reason'])):
	if($_GET['reason'] == true):
		echo json_encode($reason);
	endif;
endif;

//Get Promotion
if(isset($_GET['promotion'])):
	if($_GET['promotion'] == true):
		echo json_encode($promotion);
	endif;
endif;


/* ================================================================================= */
/** Menu */
$menu = [
	['id' => '1', 'href' => 'collapseOne', 'src' => '/cafe/img/pizza.jpg', 'name' => 'Pizza', 'desc' => ''],
	['id' => '2', 'href' => 'collapseTwo', 'src' => '/cafe/img/lasagne.jpg', 'name' => 'Lasagne', 'desc' => ''],
	['id' => '3', 'href' => 'collapseThree', 'src' => '/cafe/img/coleslaw.jpg', 'name' => 'Coleslaw', 'desc' => ''],
	['id' => '4', 'href' => 'collapseFour', 'src' => '/cafe/img/sandwich.jpg', 'name' => 'Sandwich', 'desc' => '']
];

$submenu =[
		['src' => '', 'name' => 'Four Seasons', 'id' => '1', 'desc' => 'Chicken breast, Beef, Mutton, Shrimp, Mushroom, Onion, Tomatoes, Alfredo sauce & mozzarella cheese'],
		['src' => '', 'name' => 'Layer Lasagne', 'id' => '2', 'desc' => 'Layered lasagne noodles, italian sausage and beef, ricotta cheese, tomato sauce, and baked mozzarella and romano cheese.'],
		['src' => '', 'name' => 'Creamy Cole Slaw', 'id' => '3','desc' => 'Our best yet! A crunchy coleslaw of white cabbage, carrot and onion with a chipotle spice in a rich and creamy dressing'],
		['src' => '', 'name' => 'King Club', 'id' => '4','desc' => 'Cut the carbs! Double the meat, double the cheeses, double the flavor']
];

//Get Menu
if(isset($_GET['menu'])):
	if($_GET['menu'] == true):
		echo json_encode($menu);
	endif;
endif;

//Get Sub-Menu
if(isset($_GET['submenu'])):
	if($_GET['submenu'] == true):
		echo json_encode($submenu);
	endif;
endif;

/* ================================================================================= */
/** Contact Us */

//Address Data
$address = ["address" => " Dhaka, Bangladesh", "phone" => "+88017-XXXXXXXX", "email" => "khan.photon@gmail.com"];

//Reservation Data
$reservation = [
			["date" => " 30-Apr-18", "time" => "8:00 PM", "name" => "Sam's Birthday Party", "reserve" => "Half", "description" => "Balloons and party poppers allowed!"],
			["date" => " 21-Nov-18", "time" => "2:00 PM", "name" => "Dane's School Reunion", "reserve" => "Full", "description" => "Outside Foods are not allowed!"]
];

//Get Location
if(isset($_GET['address'])):
	if($_GET['address'] == true):
		echo json_encode($address);
	endif;
endif;

//Get Reservation
if(isset($_GET['reservation'])):
	if($_GET['reservation'] == true):
		echo json_encode($reservation);
	endif;
endif;



