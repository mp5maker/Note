<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/config.inc.php");
require(MYSQL);


if(isset($_SESSION['user_not_expired']) && isset($_SESSION['user_id'])):
	$page_title = "PDFs";
	require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/header.php");
	$body = "<h3 class = 'pl-2'>PDF Guides</h3>";
	$query = "SELECT id, tmp_name, title, description, size, file_name FROM pdfs ORDER BY date_created DESC";
	$result = mysqli_query($dbc, $query);
	if(mysqli_num_rows($result) > 0):
		while($row = mysqli_fetch_array($result)):
			$body .= "<p class = 'text-primary ml-2'><a href = '/E-Commerce/pdf/view-pdf/".$row['id']."' class = 'nounderline'>".$row['title']."</a></p>";
		endwhile;
		require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/body.php");
		require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/footer.php");
	else:
		$body .= "<h2 class = 'ml-2'>Currently, there are no PDFS to view!</h2>";
	endif;
endif;

if(!isset($_SESSION['user_not_expired'])):
		$page_title = "User Expired";
		include($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/header.php");
		$body = "<h1 class = 'ml-2 mt-2 text-success'> Thank you for you interest in this content </h1>";
		$body .= "<p class = 'ml-2 mt-2 text-danger'> Unfortunately you account has been expired. </p>";
		$body .= "<p class = 'ml-2 mt-2 text-danger'> <a href = 'renew' class = 'nounderline'>Renew Your Account</a></p>";
		$body .= "<p class = 'ml-2 mt-2 text-danger'>In order to access site content.</p>";
		include($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/body.php");
		include($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/footer.php");
		exit();
endif;

if(!isset($_SESSION['user_id'])):
	$page_title = "User not Logged in";
	include($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/header.php");
	$body = "<h1 class = 'ml-2 mt-2 text-success'> Thank you for you interest in this content </h1>";
	$body .= "<p class = 'ml-2 mt-2 text-danger'>You must be logged in as a registered user to view site content. </p>";
	include($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/body.php");
	include($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/footer.php");
	exit();
endif;
?>

