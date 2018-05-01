<?php
// require_once($_SERVER['DOCUMENT_ROOT']."/cafe/admin/includes/config.php");
// require_once(BASE."/cafe/admin/includes/database.php");

$db = new database();

/**
 * Common Page Updates
 */
//Update Website Name
if(isset($_POST['website'])):
	if($_POST['website'] == true):
		if(!empty($_POST['name'])):
			$db = new database();
			$db->table("website");
			$db->update(["name" => $_POST['name']],["id" => 1]);
			if($db->affected()):
				$messages['website'] = 'Successfully Updated';
			endif;
		else:
			$errors['name'] = 'Field cannot be empty';
		endif;
	endif;
endif;

//Update Navigation 
if(isset($_POST['update_navigation'])):
	if($_POST['update_navigation'] == true):
		if(!empty($_POST['update_nav_name'])):
			$db = new database();
			$db->table("navigation");
			$db->update(["name" => $_POST['update_nav_name'], 'icon' => $_POST['update_nav_icon']],["id" => (int)$_POST['update_nav_id']]);
			if($db->affected()):
				$messages['update_navigation'] = 'Successfully Updated';
			endif;
		else:
			$errors['update_nav_name'] = 'Field cannot be empty';
		endif;
	endif;
endif;


//Update Logo
if(isset($_POST['select_logo_submit'])):
	if($_POST['select_logo_submit'] == true):
		if(!empty($_POST['select_logo'])):
			$db = new database();
			$db->table("logo");
			$db->update(["src" => "/cafe/img/".$_POST['select_logo']],["id" => 1]);
			if($db->affected()):
				$messages['select_logo'] = 'Successfully Updated';
			endif;
		else:
			$errors['select_logo'] = 'Field cannot be empty';
		endif;
	endif;
endif;

//Update Brand
if(isset($_POST['select_brand_submit'])):
	if($_POST['select_brand_submit'] == true):
		if(!empty($_POST['select_brand'])):
			$db = new database();
			$db->table("brand");
			$db->update(["src" => $_POST['select_brand']],["id" => 1]);
			if($db->affected()):
				$messages['select_brand'] = 'Successfully Updated';
			endif;
		else:
			$errors['select_brand'] = 'Field cannot be empty';
		endif;
	endif;
endif;


//Update Footer 
if(isset($_POST['footer'])):
	if($_POST['footer'] == true):
		if(!empty($_POST['copy'])):
			$db = new database();
			$db->table("footer");
			$db->update(["copy" => $_POST['copy']],["id" => 1]);
			if($db->affected()):
				$messages['footer'] = 'Successfully Updated';
			endif;
		else:
			$errors['copy'] = 'Field cannot be empty';
		endif;
	endif;
endif;


/**
 * Index Page Updates
 */

// Update About
if(isset($_POST['about'])):
	if($_POST['about'] == true):
		if(!empty($_POST['update_about_title']) && !empty($_POST['update_about_desc'])):
			$db = new database();
			$db->table("about");
			$db->update(["title" => $_POST['update_about_title'], 'description' => $_POST['update_about_desc']],["id" => 1]);
			if($db->affected()):
				$messages['about'] = 'Successfully Updated';
			endif;
		endif;
		if(empty($_POST['update_about_title'])):
			$errors['update_about_title'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['update_about_desc'])):
			$errors['update_about_desc'] = 'Field cannot be empty';
		endif;
	endif;
endif;

// Update Chart Options
if(isset($_POST['chartoptions'])):
	if($_POST['chartoptions'] == true):
		if(!empty($_POST['title']) && !empty($_POST['is3D'])):
			$db = new database();
			$db->table("chart_options");
			$db->update(["title" => $_POST['title'], 'threedee' => $_POST['is3D']],["id" => 1]);
			if($db->affected()):
				$messages['chartoptions'] = 'Successfully Updated';
			endif;
		endif;
		if(empty($_POST['title'])):
			$errors['title'] = 'Field cannot be empty';
		endif;
	endif;
endif;

// Update Chart Data
if(isset($_POST['update_chart_data'])):
	if($_POST['update_chart_data'] == true):
		if(!empty($_POST['update_reason']) && !empty($_POST['update_amount'])):
			$db = new database();
			$db->table("chart_data");
			$db->update(["percentage" => $_POST['update_amount']],["reason" => $_POST['update_reason']]);
			if($db->affected()):
				$messages['update_chart_data'] = 'Successfully Updated';
			endif;
		endif;
		if(empty($_POST['update_amount'])):
			$errors['update_amount'] = 'Field cannot be empty';
		endif;
	endif;
endif;

// Update Notice
if(isset($_POST['notice'])):
	if($_POST['notice'] == true):
		if(!empty($_POST['open']) && !empty($_POST['close']) && !empty($_POST['not']) && !empty($_POST['description'])):
			$db = new database();
			$db->table("notice");
			$db->update(["open" => $_POST['open'], 'close' => $_POST['close'], 'notice' => $_POST['not'], 'description' => $_POST['description']],["id" => 1]);
			if($db->affected()):
				$messages['notice'] = 'Successfully Updated';
			endif;
		endif;
		if(empty($_POST['open'])):
			$errors['open'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['close'])):
			$errors['close'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['not'])):
			$errors['not'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['description'])):
			$errors['description'] = 'Field cannot be empty';
		endif;
	endif;
endif;

//Update Quote Data
if(isset($_POST['update_quote'])):
	if($_POST['update_quote'] == true):
		if(!empty($_POST['quote_id']) && !empty($_POST['add_quote_desc']) && !empty($_POST['add_quote_by'])):
			$db = new database();
			$db->table("quote");
			$db->update([
							'quote' => $_POST['add_quote_desc'],
							'name' => $_POST['add_quote_by']
						],["id" => $_POST['quote_id']]);
			if($db->affected()):
				$messages['update_quote'] = 'Successfully Updated';
			endif;
		endif;
		if(empty($_POST['add_quote_desc'])):
			$errors['add_quote_desc'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['add_quote_by'])):
			$errors['add_quote_by'] = 'Field cannot be empty';
		endif;
	endif;
endif;


// Update Service One
if(isset($_POST['service_one'])):
	if($_POST['service_one'] == true):
		if(!empty($_POST['service_one_id']) && !empty($_POST['service_title_1']) && !empty($_POST['service_desc_1']) && !empty($_POST['service_icon_1'])):
			$db = new database();
			$db->table("service_one");
			$db->update([
							"title" => $_POST['service_title_1'], 
							'description' => $_POST['service_desc_1'],
							'icon' => $_POST['service_icon_1']
						],["id" => $_POST['service_one_id']]);
			if($db->affected()):
				$messages['service_one'] = 'Successfully Updated';
			endif;
		endif;
		if(empty($_POST['service_title_1'])):
			$errors['service_title_1'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['service_desc_1'])):
			$errors['service_desc_1'] = 'Field cannot be empty';
		endif;
	endif;
endif;

// Update Service Two
if(isset($_POST['service_two'])):
	if($_POST['service_two'] == true):
		if(!empty($_POST['service_two_id']) && !empty($_POST['service_title_2']) && !empty($_POST['service_desc_2']) && !empty($_POST['service_icon_2'])):
			$db = new database();
			$db->table("service_two");
			$db->update([
							"title" => $_POST['service_title_2'], 
							'description' => $_POST['service_desc_2'],
							'icon' => $_POST['service_icon_2']
						],["id" => $_POST['service_two_id']]);
			if($db->affected()):
				$messages['service_two'] = 'Successfully Updated';
			endif;
		endif;
		if(empty($_POST['service_title_2'])):
			$errors['service_title_2'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['service_desc_2'])):
			$errors['service_desc_2'] = 'Field cannot be empty';
		endif;
	endif;
endif;

// Update Portfolio
if(isset($_POST['portfolio'])):
	if($_POST['portfolio'] == true):
		if(!empty($_POST['portfolio_id']) && !empty($_POST['portfolio_src']) && !empty($_POST['portfolio_desc']) && !empty($_POST['portfolio_title'])):
			$db = new database();
			$db->table("portfolio");
			$db->update([
							"src" => "/cafe/img/{$_POST['portfolio_src']}", 
							'description' => $_POST['portfolio_desc'],
							'title' => $_POST['portfolio_title']
						],["id" => $_POST['portfolio_id']]);
			if($db->affected()):
				$messages['portfolio'] = 'Successfully Updated';
			endif;
		endif;
		if(empty($_POST['portfolio_title'])):
			$errors['portfolio_title'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['portfolio_desc'])):
			$errors['portfolio_desc'] = 'Field cannot be empty';
		endif;
	endif;
endif;

// Update Location
if(isset($_POST['location'])):
	if($_POST['location'] == true):
		if(!empty($_POST['latitude']) && !empty($_POST['longitude'])):
			$db = new database();
			$db->table("location");
			$db->update(["latitude" => $_POST['latitude'], 'longitude' => $_POST['longitude']],["id" => 1]);
			if($db->affected()):
				$messages['location'] = 'Successfully Updated';
			endif;
		endif;
		if(empty($_POST['latitude'])):
			$errors['latitude'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['longitude'])):
			$errors['longitude'] = 'Field cannot be empty';
		endif;
	endif;
endif;

/**
 * Home Page Updates
 */

// Update Home
if(isset($_POST['home'])):
	if($_POST['home'] == true):
		if(!empty($_POST['title1']) && !empty($_POST['desc11']) && !empty($_POST['desc12'])
			&& !empty($_POST['title2']) && !empty($_POST['desc2'])):
			$db = new database();
			$db->table("home");
			$db->update(["title1" => $_POST['title1'], 'desc11' => $_POST['desc11'], 
						'desc12' => $_POST['desc12'], 'title2' => $_POST['title2'],
						'desc2' => $_POST['desc2']],["id" => 1]);
			if($db->affected()):
				$messages['home'] = 'Successfully Updated';
			endif;
		endif;
		if(empty($_POST['title1'])):
			$errors['title1'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['desc11'])):
			$errors['desc11'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['desc12'])):
			$errors['desc12'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['title2'])):
			$errors['title2'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['desc2'])):
			$errors['desc2'] = 'Field cannot be empty';
		endif;
	endif;
endif;

// Update Reason
if(isset($_POST['reason'])):
	if($_POST['reason'] == true):
		if(!empty($_POST['reason_id']) && !empty($_POST['reason_src']) && !empty($_POST['reason_desc'])):
			$db = new database();
			$db->table("reason");
			$db->update(["src" => "/cafe/img/{$_POST['reason_src']}", 'description' => $_POST['reason_desc']],["id" => $_POST['reason_id']]);
			if($db->affected()):
				$messages['reason'] = 'Successfully Updated';
			endif;
		endif;
		if(empty($_POST['reason_desc'])):
			$errors['reason_desc'] = 'Field cannot be empty';
		endif;
	endif;
endif;

//Update Promotion
if(isset($_POST['update_promotion'])):
	if($_POST['update_promotion'] == true):
		if(!empty($_POST['update_promo_price']) && 
		   !empty($_POST['update_promo_sale_price']) &&
		   !empty($_POST['update_promo_image']) &&
		   !empty($_POST['update_promo_start']) &&
		   !empty($_POST['update_promo_end']) &&
		   !empty($_POST['update_promo_desc']) &&
		   !empty($_POST['update_promo_name']) && (int)$_POST['update_promo_price'] >= (int)$_POST['update_promo_sale_price']
		   && compare_date($_POST['update_promo_start'],$_POST['update_promo_end']) == true &&
		   !empty($_POST['update_promo_id'])
		):
			$start_date_format = explode('-', $_POST['update_promo_start']);
			month_convert($start_date_format[1]);
			$start_date_format = implode('-',[$start_date_format[2], $start_date_format[1], $start_date_format[0]]);
			$end_date_format = explode('-', $_POST['update_promo_end']);
			month_convert($end_date_format[1]);
			$end_date_format = implode('-',[$end_date_format[2], $end_date_format[1], $end_date_format[0]]);
			$src = "/cafe/img/".$_POST['update_promo_image'];
			
			$db = new database();
			$db->table("promotion");
			$db->update(["name" => $_POST['update_promo_name'], 'src' => $src , 'price' => $_POST['update_promo_price'], 'sale_price' => $_POST['update_promo_sale_price'], 'description' => $_POST['update_promo_desc'], 'date_start' => $start_date_format, 'date_end' => $end_date_format],["id" => $_POST['update_promo_id']]);
			
			if($db->affected()):
				$messages['update_promotion'] = 'Successfully Added';
			endif;
		else:
		endif;
		if(compare_date($_POST['update_promo_start'],$_POST['update_promo_end']) == false):
			$errors['update_promo_end'] = 'Promo ending date cannot be earlier than promo starting date!';
		endif;
		if(empty($_POST['update_promo_name'])):
			$errors['update_promo_name'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['update_promo_price'])):
			$errors['update_promo_price'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['update_promo_sale_price'])):
			$errors['update_promo_sale_price'] = 'Field cannot be empty';
		endif;
		if((int)$_POST['update_promo_price'] < (int)$_POST['update_promo_sale_price']):
			$errors['update_promo_sale_price'] = 'Offer Price needs to be less than the regular price!';
		endif;
		if(empty($_POST['update_promo_desc'])):
			$errors['update_promo_desc'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['update_promo_start'])):
			$errors['update_promo_start'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['update_promo_end'])):
			$errors['update_promo_end'] = 'Field cannot be empty';
		endif;
	endif;
endif;

/**
 * Menu Page Updates
 */
// Update Menu
if(isset($_POST['update_menu'])):
	if($_POST['update_menu'] == true):
		if(!empty($_POST['update_menu_id']) && !empty($_POST['menu_update_href']) && 
			!empty($_POST['menu_update_src']) && !empty($_POST['menu_update_name']) &&   
			!empty($_POST['menu_update_desc'])):
			$db = new database();
			$db->table("menu");
			$db->update(["href" => $_POST['menu_update_href'], 
						'src' => "/cafe/img/{$_POST['menu_update_src']}",
						'name' => $_POST['menu_update_name'],
						'description' => $_POST['menu_update_desc'],

					],["id" => $_POST['update_menu_id']]);
			if($db->affected()):
				$messages['update_menu'] = 'Successfully Updated';
			endif;
		endif;
		if(empty($_POST['menu_update_src'])):
			$errors['menu_update_src'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['menu_update_name'])):
			$errors['menu_update_name'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['menu_update_desc'])):
			$errors['menu_update_desc'] = 'Field cannot be empty';
		endif;
	endif;
endif;

// Update SubMenu
if(isset($_POST['update_submenu'])):
	if($_POST['update_submenu'] == true):
		if(!empty($_POST['update_sub_cat_id']) && !empty($_POST['update_submenu_id']) && !empty($_POST['update_sub_name']) && !empty($_POST['update_sub_src'])  && !empty($_POST['update_sub_desc'])):
			$db = new database();
			$db->table("submenu");
			$db->update(["cat_id" => $_POST['update_sub_cat_id'], 
						'src' => "/cafe/img/{$_POST['update_sub_src']}",
						'name' => $_POST['update_sub_name'],
						'description' => $_POST['update_sub_desc'],

					],["id" => $_POST['update_submenu_id']]);
			if($db->affected()):
				$messages['update_submenu'] = 'Successfully Updated';
			endif;
		endif;
		if(empty($_POST['update_sub_name'])):
			$errors['update_sub_name'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['update_sub_desc'])):
			$errors['update_sub_desc'] = 'Field cannot be empty';
		endif;
	endif;
endif;

/**
 * Contact Us Page Updates
 */
// Update Address
if(isset($_POST['address'])):
	if($_POST['address'] == true):
		if(!empty($_POST['dest']) && !empty($_POST['phone']) && !empty($_POST['email'])):
			$db = new database();
			$db->table("address");
			$db->update(["address" => $_POST['dest'], 'phone' => $_POST['phone'], 
						'email' => $_POST['email']],["id" => 1]);
			if($db->affected()):
				$messages['address'] = 'Successfully Updated';
			endif;
		endif;
		if(empty($_POST['dest'])):
			$errors['dest'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['phone'])):
			$errors['phone'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['email'])):
			$errors['email'] = 'Field cannot be empty';
		endif;
	endif;
endif;

// Update Reservation
if(isset($_POST['update_reservation'])):
	if($_POST['update_reservation'] == true):
		if(!empty($_POST['update_event_date']) && !empty($_POST['update_event_time']) && !empty($_POST['update_event_name']) && 
			!empty($_POST['update_event_reserve']) && !empty($_POST['update_event_desc']) && !empty($_POST['update_event_id'])):
			$db = new database();
			$db->table("reservation");
			$db->update(["date" => $_POST['update_event_date'], 'time' => $_POST['update_event_time'], 
						'name' => $_POST['update_event_name'], 'reserve' => $_POST['update_event_reserve'], 'description' => $_POST['update_event_desc']],["id" => $_POST['update_event_id']]);
			if($db->affected()):
				$messages['update_reservation'] = 'Successfully Updated';
			endif;
		endif;
		if(empty($_POST['update_event_date'])):
			$errors['update_event_date'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['update_event_time'])):
			$errors['update_event_time'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['update_event_name'])):
			$errors['update_event_name'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['update_event_reserve'])):
			$errors['update_event_reserve'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['update_event_desc'])):
			$errors['update_event_desc'] = 'Field cannot be empty';
		endif;
	endif;
endif;

/**
 * Administrative Settings Update
 */
//Change Password
if(isset($_POST['update_admin'])):
	if($_POST['update_admin'] == true):
		if(!empty($_POST['update_username']) && !empty($_POST['update_pwd']) 
			&& !empty($_POST['update_pwd']) && !empty($_POST['update_new_pwd']) 
			&& !empty($_POST['update_new_pwd2']) &&
			$_POST['update_new_pwd'] == $_POST['update_new_pwd2']
			):
			$validator = new Validator();
			$validator->email($_POST['update_username'], 'update_username');
			$validator->password($_POST['update_pwd'], 'update_pwd');
			$validator->password($_POST['update_new_pwd'], 'update_new_pwd');
			if(empty($validator->errors())):
				$db->table("admin");
				$db->select(['email','pass'], ['email' => $_POST['update_username']]);
				$select_user = $db->fetch();
				if($db->num() == 1):
					if(password_verify($_POST['update_pwd'],$select_user[0][1])):
						$pass = htmlspecialchars($_POST['update_new_pwd']);
						$pass = password_hash($pass, PASSWORD_DEFAULT);
						$db->update(['pass' => $pass], ['email' => $_POST['update_username']]);
						if($db->affected()):
							$messages['update_admin'] = 'Successfully Updated';
						endif;
					else:
						$errors['update_pwd'] = 'Your current password is incorrect!';
					endif;
				else:
					$messages['update_admin'] = 'Username do not exist!';
				endif;
			else:
				$errors['update_username'] = isset($validator->errors()['add_username'])? $validator->errors()['update_username']:'';
				$errors['update_pwd'] = isset($validator->errors()['update_pwd'])? $validator->errors()['update_pwd']:'';
				$errors['update_new_pwd'] = isset($validator->errors()['update_new_pwd'])? $validator->errors()['update_new_pwd']:'';
			endif;
		else:
		endif;
		if(empty($_POST['update_username'])):
			$errors['update_username'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['update_pwd'])):
			$errors['update_pwd'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['update_new_pwd'])):
			$errors['update_new_pwd'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['update_new_pwd2'])):
			$errors['update_new_pwd2'] = 'Field cannot be empty';
		endif;
		if($_POST['update_new_pwd2'] != $_POST['update_new_pwd2']):
			$errors['update_new_pwd2'] = 'Password do not match!';
		endif;
	endif;
endif;