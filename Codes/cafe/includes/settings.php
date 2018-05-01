<?php
require_once($_SERVER['DOCUMENT_ROOT']."/cafe/admin/includes/config.php");
require_once(BASE."/cafe/admin/includes/database.php");

$db = new database();

//Website Data
if(isset($_GET['website'])):
	if($_GET['website'] == true):
		$db->table('website');
		$db->select(['id', 'name']);
		if($db->num() == 1):
			$fetch = $db->fetch();
			$website = ['id' => $fetch[0][0], 'name' => $fetch[0][1]];
			echo json_encode($website);
		endif;
	endif;
endif;

//Navigation Data
if(isset($_GET['navigation'])):
	if($_GET['navigation'] == true):
		$db->table('navigation');
		$db->select(['id', 'name', 'src', 'icon']);
		if($db->num() > 1):
			$fetch = $db->fetch();
			for($i = 0; $i < $db->num(); $i++):
				$navigation[] = ['id' => $fetch[$i][0], 'name' => $fetch[$i][1], 'src' => $fetch[$i][2], 'icon' => $fetch[$i][3]];
			endfor;
			echo json_encode($navigation);
		endif;
	endif;
endif;

//Logo Data
if(isset($_GET['logo'])):
	if($_GET['logo'] == true):
		$db->table('logo');
		$db->select(['id', 'src', 'alt']);
		if($db->num() == 1):
			$fetch = $db->fetch();
			$logo = ['id' => $fetch[0][0], 'src' => $fetch[0][1], 'alt' => $fetch[0][2]];
			echo json_encode($logo);
		endif;
	endif;
endif;

//Brand Data
if(isset($_GET['brand'])):
	if($_GET['brand'] == true):
		$db->table('brand');
		$db->select(['id', 'src', 'alt']);
		if($db->num() == 1):
			$fetch = $db->fetch();
			$brand = ['id' => $fetch[0][0], 'src' => $fetch[0][1], 'alt' => $fetch[0][2]];
			echo json_encode($brand);
		endif;
	endif;
endif;

//Footer Data
if(isset($_GET['footer'])):
	if($_GET['footer'] == true):
		$db->table('footer');
		$db->select(['id', 'copy']);
		if($db->num() == 1):
			$fetch = $db->fetch();
			$year = date("Y");
			$footer = "2010-{$year} {$fetch[0][1]}"; 
			$footer = ['id' => $fetch[0][0], 'copy' => $footer];
			echo json_encode($footer);
		endif;
	endif;
endif;

//About Data
if(isset($_GET['about'])):
	if($_GET['about'] == true):
		$db->table('about');
		$db->select(['id', 'title', 'description']);
		if($db->num() == 1):
			$fetch = $db->fetch();
			$about = ['id' => $fetch[0][0], 'title' => $fetch[0][1], 'desc' => $fetch[0][2]];
			echo json_encode($about);
		endif;
	endif;
endif;

//Google Chart Data
if(isset($_GET['chartoptions'])):
	if($_GET['chartoptions'] == true):
		$db->table('chart_options');
		$db->select(['id', 'title', 'threedee']);
		if($db->num() == 1):
			$fetch = $db->fetch();
			$chartoptions = ['id' => $fetch[0][0], 'title' => $fetch[0][1], 'is3D' => $fetch[0][2]];
			echo json_encode($chartoptions);
		endif;
	endif;
endif;

//Chart Data
if(isset($_GET['chartdata'])):
	if($_GET['chartdata'] == true):
		$db->table('chart_data');
		$db->select(['id', 'reason', 'percentage']);
		if($db->num() > 1):
			$cols = [["id" => "", "label" => "Reason", "pattern" => "", "type" => "string"],
					 ["id" => "", "label" => "Percentage", "pattern" => "", "type" => "number"]];
						
			$fetch = $db->fetch();
			for($i = 0; $i < $db->num(); $i++):
				$data[] = ["c" => [["v" => (int)$fetch[$i][2], "f" => $fetch[$i][1]], ["v" => (int)$fetch[$i][2], "f" => $fetch[$i][1]]]];
			endfor;
			$chartdata = ["cols" => $cols, "rows" => $data];
			echo json_encode($chartdata);
		endif;
	endif;
endif;

//Notices Data
if(isset($_GET['notice'])):
	if($_GET['notice'] == true):
		$db->table('notice');
		$db->select(['id', 'open', 'close', 'notice', 'description']);
		if($db->num() == 1):
			$fetch = $db->fetch();
			$notice = ['id' => $fetch[0][0], 'open' => $fetch[0][1], 'close' => $fetch[0][2], 'notice' => $fetch[0][3], 'description' => $fetch[0][4]];
			echo json_encode($notice);
		endif;
	endif;
endif;

//Quote Data
if(isset($_GET['quote'])):
	if($_GET['quote'] == true):
		$db->table('quote');
		$db->select(['id', 'quote', 'name']);
		if($db->num() > 1):
			$fetch = $db->fetch();
			for($i = 0; $i < $db->num(); $i++):
				$quote[] = ['id' => $fetch[$i][0], 'quote' => $fetch[$i][1], 'name' => $fetch[$i][2]];
			endfor;
			echo json_encode($quote);
		endif;
	endif;
endif;

//Service One Data
if(isset($_GET['service1'])):
	if($_GET['service1'] == true):
		$db->table('service_one');
		$db->select(['id', 'title', 'description', 'icon']);
		if($db->num() > 1):
			$fetch = $db->fetch();
			for($i = 0; $i < $db->num(); $i++):
				$service1[] = ['id' => $fetch[$i][0], 'title' => $fetch[$i][1], 'desc' => $fetch[$i][2], 'icon' => $fetch[$i][3]];
			endfor;
			echo json_encode($service1);
		endif;
	endif;
endif;

//Service Two Data
if(isset($_GET['service2'])):
	if($_GET['service2'] == true):
		$db->table('service_two');
		$db->select(['id', 'title', 'description', 'icon']);
		if($db->num() > 1):
			$fetch = $db->fetch();
			for($i = 0; $i < $db->num(); $i++):
				$service2[] = ['id' => $fetch[$i][0], 'title' => $fetch[$i][1], 'desc' => $fetch[$i][2], 'icon' => $fetch[$i][3]];
			endfor;
			echo json_encode($service2);
		endif;
	endif;
endif;

//Portfolio Data
if(isset($_GET['portfolio'])):
	if($_GET['portfolio'] == true):
		$db->table('portfolio');
		$db->select(['id', 'src', 'alt', 'title', 'description']);
		if($db->num() > 1):
			$fetch = $db->fetch();
			for($i = 0; $i < $db->num(); $i++):
				$portfolio[] = ['id' => $fetch[$i][0], 'src' => $fetch[$i][1], 'alt' => $fetch[$i][2], 'title' => $fetch[$i][3], 'desc' => $fetch[$i][4]];
			endfor;
			echo json_encode($portfolio);
		endif;
	endif;
endif;

//Location Data
if(isset($_GET['location'])):
	if($_GET['location'] == true):
		$db->table('location');
		$db->select(['id', 'latitude', 'longitude']);
		if($db->num() == 1):
			$fetch = $db->fetch();
			$location = ['id' => $fetch[0][0], 'lat' => $fetch[0][1], 'long' => $fetch[0][2]];
			echo json_encode($location);
		endif;
	endif;
endif;

//Home Data
if(isset($_GET['home'])):
	if($_GET['home'] == true):
		$db->table('home');
		$db->select(['id', 'title1', 'desc11', 'desc12', 'title2', 'desc2']);
		if($db->num() == 1):
			$fetch = $db->fetch();
			$home = ['id' => $fetch[0][0], 'title1' => $fetch[0][1], 'desc11' => $fetch[0][2], 'desc12' => $fetch[0][3], 'title2' => $fetch[0][4], 'desc2' => $fetch[0][5]];
			echo json_encode($home);
		endif;
	endif;
endif;


//Reason Data
if(isset($_GET['reason'])):
	if($_GET['reason'] == true):
		$db->table('reason');
		$db->select(['id', 'src', 'description']);
		if($db->num() > 1):
			$fetch = $db->fetch();
			for($i = 0; $i < $db->num(); $i++):
				$reason[] = ['id' => $fetch[$i][0], 'src' => $fetch[$i][1], 'desc' => $fetch[$i][2]];
			endfor;
			echo json_encode($reason);
		endif;
	endif;
endif;

//Promotion Data
if(isset($_GET['promotion'])):
	if($_GET['promotion'] == true):
		$db->table('promotion');
		$db->select(['id', 'name', 'src', 'price', 'sale_price', 'description', 'date_start', 'date_end']);
		if($db->num() > 1):
			$fetch = $db->fetch();
			for($i = 0; $i < $db->num(); $i++):
				$promotion[] = ['id' => $fetch[$i][0], 'name' => $fetch[$i][1], 'src' => $fetch[$i][2], 'price' => $fetch[$i][3], 'sale_price' => $fetch[$i][4], 'desc' => $fetch[$i][5], 'date_start' => $fetch[$i][6], 'date_end' => $fetch[$i][7]];
			endfor;
			echo json_encode($promotion);
		endif;
	endif;
endif;

//Menu Data
if(isset($_GET['menu'])):
	if($_GET['menu'] == true):
		$db->table('menu');
		$db->select(['id', 'href', 'src', 'name', 'description']);
		if($db->num() > 1):
			$fetch = $db->fetch();
			for($i = 0; $i < $db->num(); $i++):
				$menu[] = ['id' => $fetch[$i][0], 'href' => $fetch[$i][1], 'src' => $fetch[$i][2], 'name' => $fetch[$i][3], 'desc' => $fetch[$i][4]];
			endfor;
			echo json_encode($menu);
		endif;
	endif;
endif;

//SubMenu Data
if(isset($_GET['submenu'])):
	if($_GET['submenu'] == true):
		$db->table('submenu');
		$db->select(['id', 'cat_id', 'src', 'name', 'description']);
		if($db->num() > 1):
			$fetch = $db->fetch();
			for($i = 0; $i < $db->num(); $i++):
				$submenu[] = ['sub_id' => $fetch[$i][0], 'id' => $fetch[$i][1], 'src' => $fetch[$i][2], 'name' => $fetch[$i][3], 'desc' => $fetch[$i][4]];
			endfor;
			echo json_encode($submenu);
		endif;
	endif;
endif;

//Address Data
if(isset($_GET['address'])):
	if($_GET['address'] == true):
		$db->table('address');
		$db->select(['id', 'address', 'phone', 'email']);
		if($db->num() == 1):
			$fetch = $db->fetch();
			$address = ['id' => $fetch[0][0], 'address' => $fetch[0][1], 'phone' => $fetch[0][2], 'email' => $fetch[0][3]];
			echo json_encode($address);
		endif;
	endif;
endif;

//Reservation Data
if(isset($_GET['reservation'])):
	if($_GET['reservation'] == true):
		$db->table('reservation');
		$db->select(['id', 'date', 'time', 'name', 'reserve', 'description']);
		if($db->num() > 1):
			$fetch = $db->fetch();
			for($i = 0; $i < $db->num(); $i++):
				$reservation[] = ['id' => $fetch[$i][0], 'date' => $fetch[$i][1], 'time' => $fetch[$i][2], 'name' => $fetch[$i][3], 'reserve' => $fetch[$i][4], 'description' => $fetch[$i][5]];
			endfor;
			echo json_encode($reservation);
		endif;
	endif;
endif;


