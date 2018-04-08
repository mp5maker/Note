<?php 
require($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/config.inc.php");
require(MYSQL);

if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, ['min_range' => 1])):
	$query = "SELECT category FROM categories WHERE id = '".$_GET['id']."'";
	$result = mysqli_query($dbc, $query);
	if(mysqli_num_rows($result) != 1):
		$page_title = "Error!";
		require($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/header.php");
		$body = "<h1 class = 'ml-2 mt-2 text-danger'> This page has been accessed in error </h1>";
		require($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/body.php");
		require($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/footer.php");
		exit();
	endif;

	$row = mysqli_fetch_array($result);
	$page_title = $row['category'];
	include($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/header.php");

	if(isset($_SESSION['user_id']) && !isset($_SESSION['user_not_expired'])):
		$body = "<h1 class = 'ml-2 mt-2 text-success'> Thank you for you interest in this content </h1>";
		$body .= "<p class = 'ml-2 mt-2 text-danger'> Unfortunately you account has been expired. </p>";
		$body .= "<p class = 'ml-2 mt-2 text-danger'> <a href = 'renew' class = 'nounderline'>Renew Your Account</a></p>";
		$body .= "<p class = 'ml-2 mt-2 text-danger'>In order to access site content.</p>";
	elseif(!isset($_SESSION['user_id'])):
		$body = "<h1 class = 'ml-2 mt-2 text-success'> Thank you for you interest in this content </h1>";
		$body .= "<p class = 'ml-2 mt-2 text-danger'>You must be logged in as a registered user to view site content. </p>";
	endif;

	if(isset($_SESSION['user_id']) && isset($_SESSION['user_not_expired'])):
		$query = "SELECT id, title, description FROM pages WHERE category_id = '".$_GET['id']."' ORDER BY date_created DESC";
		$result = mysqli_query($dbc, $query);
		if(mysqli_num_rows($result) > 0):
			$count = 0;
			while($row = mysqli_fetch_array($result)):
				if($count == 0):
					$body = "<h3 class = 'ml-2'>";
				endif;
					$body .= "<h3 class = 'ml-2'>";
						$body .= "<a href = '/E-Commerce/category/page/".$row['id']."' class = 'nounderline'>";
							$body .= $row['title'];
						$body .= "</a>";
					$body .= "</h3>";
					$body .= "<p class = 'ml-2'><code>";
					$body .= $row['description'];
					$body .= "</code></p'>";
				$count++;
			endwhile;
		endif;
	else:
		$page_title = "Error!";
		$body = "<h1 class = 'ml-2 mt-2 text-danger'> This page has been accesssed in error</h1>";
	endif;
	include($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/body.php");
	include($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/footer.php");
endif;
?>

