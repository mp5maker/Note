<?php
$db = new database();

/**
 * Index Page Updates
 */

//Delete Quotes
if(isset($_POST['delete_quote'])):
	if($_POST['delete_quote'] == true):
		if(!empty($_POST['delete_quote_id'])):
			if($_POST['delete_quote_id'] > 3):
				$db = new database();
				$db->table("quote");
				$db->delete($_POST['delete_quote_id']);
				if($db->affected()):
					$messages['delete_quote'] = 'Successfully Deleted';
				endif;
			else:
				$messages['delete_quote'] = 'You cannot delete the first three items, you can update them';
			endif;
		else:
		endif;
	endif;
endif;


// Delete Chart Data
if(isset($_POST['delete_chart_data'])):
	if($_POST['delete_chart_data'] == true):
		if(!empty($_POST['delete_reason'])):
			if($_POST['delete_reason'] > 6):
				$db = new database();
				$db->table("chart_data");
				$db->delete($_POST['delete_reason']);
				if($db->affected()):
					$messages['delete_chart_data'] = 'Successfully Deleted';
				endif;
			else:
				$messages['delete_chart_data'] = 'You cannot delete the first six items, you can update them';
			endif;
		else:
		endif;
	endif;
endif;

/**
 * Home Page Updates
 */
//Delete Promotion
if(isset($_POST['delete_promotion'])):
	if($_POST['delete_promotion'] == true):
		if(!empty($_POST['delete_promo_id'])):
			if($_POST['delete_promo_id'] > 1):
				$db = new database();
				$db->table("promotion");
				$db->delete($_POST['delete_promo_id']);
				if($db->affected()):
					$messages['delete_promotion'] = 'Successfully Deleted';
				endif;
			else:
				$messages['delete_promotion'] = 'You cannot delete the first item, you can update it';
			endif;
		else:
		endif;
	endif;
endif;


/**
 * Menu Page Updates
 */
//Delete Menu
if(isset($_POST['delete_menu'])):
	if($_POST['delete_menu'] == true):
		if(!empty($_POST['delete_menu_id'])):
			if($_POST['delete_menu_id'] > 4):
				$db = new database();
				$db->table("menu");
				$db->delete($_POST['delete_menu_id']);
				if($db->affected()):
					$messages['delete_menu'] = 'Successfully Deleted';
				endif;
			else:
				$messages['delete_menu'] = 'You cannot delete the first four items, you can update it';
			endif;
		else:
		endif;
	endif;
endif;

//Delete SubMenu
if(isset($_POST['delete_submenu'])):
	if($_POST['delete_submenu'] == true):
		if(!empty($_POST['delete_submenu_id'])):
			if($_POST['delete_submenu_id'] > 4):
				$db = new database();
				$db->table("submenu");
				$db->delete($_POST['delete_submenu_id']);
				if($db->affected()):
					$messages['delete_submenu'] = 'Successfully Deleted';
				endif;
			else:
				$messages['delete_submenu'] = 'You cannot delete the first four items, you can update it';
			endif;
		else:
		endif;
	endif;
endif;


/**
 * Contact Us Page Updates
 */
//Delete Reservation
if(isset($_POST['delete_reservation'])):
	if($_POST['delete_reservation'] == true):
		if(!empty($_POST['delete_event_id'])):
			if($_POST['delete_event_id'] > 1):
				$db = new database();
				$db->table("reservation");
				$db->delete($_POST['delete_event_id']);
				if($db->affected()):
					$messages['delete_reservation'] = 'Successfully Deleted';
				endif;
			else:
				$messages['delete_reservation'] = 'You cannot delete the first item, you can update it';
			endif;
		else:
		endif;
	endif;
endif;

/**
 * Administrative Page Updates
 */
//Delete Admin
if(isset($_POST['delete_admin'])):
	if($_POST['delete_admin'] == true):
		if(!empty($_POST['delete_admin_id'])):
			if($_POST['delete_admin_id'] > 2):
				$db = new database();
				$db->table("admin");
				$db->delete($_POST['delete_admin_id']);
				if($db->affected()):
					$messages['delete_admin'] = 'Successfully Deleted';
				endif;
			else:
				$messages['delete_email'] = 'The first two superadmins cannot be deleted!';
			endif;
		else:
		endif;
	endif;
endif;

//Delete Reservation
if(isset($_POST['delete_email'])):
	if($_POST['delete_email'] == true):
		if(!empty($_POST['delete_email_id'])):
			if($_POST['delete_email_id'] > 3):
				$db = new database();
				$db->table("email");
				$db->delete($_POST['delete_email_id']);
				if($db->affected()):
					$messages['delete_email'] = 'Successfully Deleted';
				endif;
			else:
				$messages['delete_email'] = 'You cannot delete the first three emails!';
			endif;
		else:
		endif;
	endif;
endif;

//Delete Image
if(isset($_POST['delete_image_submit'])):
	if($_POST['delete_image_submit'] == true):
		if(!empty($_POST['delete_image'])):
			$path = $_SERVER['DOCUMENT_ROOT']."/cafe/img/".$_POST['delete_image'];
			if(file_exists($path)):
				unlink($path);
				$messages['delete_image_submit'] = 'Successfully Deleted';
			else:
				$this->errors['delete_image'] = 'This file do not exist';
			endif;
		else:
			$this->errors['delete_image'] = 'You need to select an image to delete it!';
		endif;
	endif;
endif;
