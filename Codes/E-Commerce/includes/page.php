<?php
require($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/config.inc.php");
require(MYSQL);

if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, ['min_range' => 1])):
	$query = "SELECT title, description, content FROM pages WHERE id = '".$_GET['id']."'";
	$result = mysqli_query($dbc, $query);
	if(mysqli_num_rows($result) != 1):
		$page_title = "Error!";
		include($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/header.php");
		$body = "<h1 class = 'ml-2 mt-2 text-danger'> This page has been accessed in error </h1>";
		include($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/body.php");
		include($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/footer.php");
		exit();
	endif;
	if(isset($_SESSION['user_not_expired']) && isset($_SESSION['user_id'])):
		while($row = mysqli_fetch_array($result)):
			$page_title = $row['title'];
			include($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/header.php");
			$body = "<h1 class = 'text-primary'> ".$row['title']." </h1>";
			$body .= "<h2>".$row['description']."</h2>";
			$body .= "<h2>".$row['content']."</h2>";
		endwhile;
		include($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/body.php");
		include($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/footer.php");
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
endif;
?>

