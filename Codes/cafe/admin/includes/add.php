<?php
// require_once($_SERVER['DOCUMENT_ROOT']."/cafe/admin/includes/config.php");
// require_once(BASE."/cafe/admin/includes/database.php");

$db = new database();

/**
 * Index Page Updates
 */

//Add Quotes
if(isset($_POST['add_quote'])):
	if($_POST['add_quote'] == true):
		if(!empty($_POST['quote']) && !empty($_POST['quote_by'])):
			$db = new database();
			$db->table("quote");
			$db->insert(['quote','name'], [$_POST['quote'], $_POST['quote_by']]);
			if($db->affected()):
				$messages['add_quote'] = 'Successfully Added';
			endif;
		else:
		endif;
		if(empty($_POST['quote'])):
			$errors['quote'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['quote_by'])):
			$errors['quote_by'] = 'Field cannot be empty';
		endif;
	endif;
endif;

//Add Chart Data
if(isset($_POST['add_chart_data'])):
	if($_POST['add_chart_data'] == true):
		if(!empty($_POST['add_reason']) && !empty($_POST['add_amount'])):
			$db = new database();
			$db->table("chart_data");
			$db->insert(['reason','percentage'], [$_POST['add_reason'], $_POST['add_amount']]);
			if($db->affected()):
				$messages['add_chart_data'] = 'Successfully Added';
			endif;
		else:
		endif;
		if(empty($_POST['add_reason'])):
			$errors['add_reason'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['add_amount'])):
			$errors['add_amount'] = 'Field cannot be empty';
		endif;
	endif;
endif;

/**
 * Home Settings Update
 */
//Add Promotion
if(isset($_POST['add_promotion'])):
	if($_POST['add_promotion'] == true):
		if(!empty($_POST['add_promo_price']) && 
		   !empty($_POST['add_promo_sale_price']) &&
		   !empty($_POST['add_promo_image']) &&
		   !empty($_POST['add_promo_start']) &&
		   !empty($_POST['add_promo_end']) &&
		   !empty($_POST['add_promo_desc']) &&
		   !empty($_POST['add_promo_name']) && (int)$_POST['add_promo_price'] >= (int)$_POST['add_promo_sale_price']
		   && compare_date($_POST['add_promo_start'],$_POST['add_promo_end']) == true
		):
			$start_date_format = explode('-', $_POST['add_promo_start']);
			month_convert($start_date_format[1]);
			$start_date_format = implode('-',[$start_date_format[2], $start_date_format[1], $start_date_format[0]]);

			$end_date_format = explode('-', $_POST['add_promo_end']);
			month_convert($end_date_format[1]);
			$end_date_format = implode('-',[$end_date_format[2], $end_date_format[1], $end_date_format[0]]);
			
			$src = "/cafe/img/".$_POST['add_promo_image'];
			$db = new database();
			$db->table("promotion");
			$db->insert(['name','src','price','sale_price','description','date_start', 'date_end'], 
				[
					$_POST['add_promo_name'], $src, (int)$_POST['add_promo_price'], (int)$_POST['add_promo_sale_price'], $_POST['add_promo_desc'], $start_date_format, $end_date_format
				]);
			if($db->affected()):
				$messages['add_promotion'] = 'Successfully Added';
			endif;
		else:
		endif;
		if(compare_date($_POST['add_promo_start'],$_POST['add_promo_end']) == false):
			$errors['add_promo_end'] = 'Promo ending date cannot be earlier than promo starting date!';
		endif;
		if(empty($_POST['add_promo_name'])):
			$errors['add_promo_name'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['add_promo_price'])):
			$errors['add_promo_price'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['add_promo_sale_price'])):
			$errors['add_promo_sale_price'] = 'Field cannot be empty';
		endif;
		if((int)$_POST['add_promo_price'] < (int)$_POST['add_promo_sale_price']):
			$errors['add_promo_sale_price'] = 'Offer Price needs to be less than the regular price!';
		endif;
		if(empty($_POST['add_promo_desc'])):
			$errors['add_promo_desc'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['add_promo_start'])):
			$errors['add_promo_start'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['add_promo_end'])):
			$errors['add_promo_end'] = 'Field cannot be empty';
		endif;
	endif;
endif;

/**
 * Menu Settings Update
 */
//Add Menu
if(isset($_POST['add_menu'])):
	if($_POST['add_menu'] == true):
		if(!empty($_POST['menu_href']) && !empty($_POST['menu_src']) &&
		   !empty($_POST['menu_name']) && !empty($_POST['menu_desc'])):
			$db = new database();
			$db->table("menu");
			$src = "/cafe/img/".$_POST['menu_src'];
			$db->insert(['href','src', 'name', 'description'], 
				[$_POST['menu_href'], $src, $_POST['menu_name'], $_POST['menu_desc']]);
			if($db->affected()):
				$messages['add_menu'] = 'Successfully Added';
			endif;
		else:
		endif;
		if(empty($_POST['menu_src'])):
			$errors['menu_src'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['menu_name'])):
			$errors['menu_name'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['menu_desc'])):
			$errors['menu_desc'] = 'Field cannot be empty';
		endif;
	endif;
endif;

//Add SubMenu
if(isset($_POST['add_submenu'])):
	if($_POST['add_submenu'] == true):
		if(!empty($_POST['submenu_cat_id']) && !empty($_POST['submenu_name']) &&
		   !empty($_POST['submenu_src']) && !empty($_POST['submenu_desc'])):
			$db = new database();
			$db->table("submenu");
			$src = "/cafe/img/".$_POST['submenu_src'];
			$db->insert(['cat_id','src', 'name', 'description'], 
				[$_POST['submenu_cat_id'], $src, $_POST['submenu_name'], $_POST['submenu_desc']]);
			if($db->affected()):
				$messages['add_submenu'] = 'Successfully Added';
			endif;
		else:
		endif;
		if(empty($_POST['submenu_name'])):
			$errors['submenu_name'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['submenu_desc'])):
			$errors['submenu_desc'] = 'Field cannot be empty';
		endif;
	endif;
endif;

/**
 * Contact Us Settings Update
 */
//Add Reservation
if(isset($_POST['add_reservation'])):
	if($_POST['add_reservation'] == true):
		if(
			!empty($_POST['add_event_date']) && !empty($_POST['add_event_time']) &&
			!empty($_POST['add_event_name']) && !empty($_POST['add_event_reserve']) &&
			!empty($_POST['add_event_desc'])
			):
			$db = new database();
			$db->table("reservation");
			$db->insert(['date', 'time', 'name', 'reserve', 'description'], [$_POST['add_event_date'], $_POST['add_event_time'], $_POST['add_event_name'], $_POST['add_event_reserve'], $_POST['add_event_desc']]);
			if($db->affected()):
				$messages['add_reservation'] = 'Successfully Added';
			endif;
		else:
		endif;
		if(empty($_POST['add_event_date'])):
			$errors['add_event_date'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['add_event_time'])):
			$errors['add_event_time'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['add_event_name'])):
			$errors['add_event_name'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['add_event_reserve'])):
			$errors['add_event_reserve'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['add_event_desc'])):
			$errors['add_event_desc'] = 'Field cannot be empty';
		endif;
	endif;
endif;

/**
 * Administrative Settings Update
 */
//Add Admin
if(isset($_POST['add_admin'])):
	if($_POST['add_admin'] == true):
		if(!empty($_POST['add_username']) && !empty($_POST['add_pwd']) 
			&& !empty($_POST['add_pwd2']) && $_POST['add_pwd'] == $_POST['add_pwd2']
			):
			$validator = new Validator();
			$validator->email($_POST['add_username'], 'add_username');
			$validator->password($_POST['add_pwd'], 'add_pwd');
			if(empty($validator->errors())):
				$db->table("admin");
				$db->select(['email']);
				$all_email = $db->fetch();
				for($i = 0; $i < $db->num(); $i++):
					$check_email[] = $all_email[$i][0];
				endfor;
				if(in_array($_POST['add_username'], $check_email)):
					$messages['add_admin'] = 'Username already exists';
				else:
					$pass = htmlspecialchars($_POST['add_pwd']);
					$pass = password_hash($pass, PASSWORD_DEFAULT);
					$db->insert(['email', 'pass'], [$_POST['add_username'], $pass]);
					if($db->affected()):
						$messages['add_admin'] = 'Successfully Added';
					endif;
				endif;
			else:
				$errors['add_username'] = isset($validator->errors()['add_username'])? $validator->errors()['add_username']:'';
				$errors['add_pwd'] = isset($validator->errors()['add_pwd'])? $validator->errors()['add_pwd']:'';
			endif;
		else:
		endif;
		if(empty($_POST['add_username'])):
			$errors['add_username'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['add_pwd'])):
			$errors['add_pwd'] = 'Field cannot be empty';
		endif;
		if(empty($_POST['add_pwd2'])):
			$errors['add_pwd2'] = 'Field cannot be empty';
		endif;
		if($_POST['add_pwd2'] != $_POST['add_pwd']):
			$errors['add_pwd2'] = 'Password do not match!';
		endif;
	endif;
endif;

//Add Images
if(isset($_POST['upload_image_submit'])):
	if(!empty($_POST['upload_image_name'])):
		$validator = new Validator();
		$validator->file($_FILES['upload_image'], 'upload_image');
		if(!empty($validator->errors())):
			$errors['upload_image'] = $validator->errors()['upload_image'];
		endif;
		if(!empty($validator->messages())):
			$messages['upload_image'] = $validator->messages()['upload_image']; 
		endif;
	else:
		$errors['upload_image_name'] = "Field cannot be empty!";
	endif;
endif;