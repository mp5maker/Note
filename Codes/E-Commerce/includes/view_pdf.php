<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/config.inc.php');
require_once(MYSQL);

if(isset($_GET['id']) && isset($_SESSION['user_not_expired'])):
	$i = (int)$_GET['id'];
	$query = "SELECT * FROM pdfs WHERE id = '".$_GET['id']."'";
	$result = mysqli_query($dbc, $query);
	if(mysqli_num_rows($result) == 1):
		while($row = mysqli_fetch_array($result)):
			$page_title = $row['title'];
			require_once($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/header.php');
			$file = $_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/pdfs/'.$row['file_name'];
			if(file_exists($file) && is_file($file)):
			 //    header('Content-Type:application/pdf');
			 //    header('Content-Disposition:inline; filename="'.$row['file_name'].'"');
			 //    header('Content-Length: '.filesize($file));
				// @readfile($file);
				$body = "<iframe src= '/E-Commerce/includes/pdfs/".$row['file_name']."'
								 width='100%' style='height:100%''>
						</iframe>";
				require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/body.php");
				require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/footer.php");
			endif;
		endwhile;
	endif;
else:
	$page_title = "Error!";
	require_once($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/header.php');
	$body = '<h3 class = "pl-2 text-danger"> You do not have the access to this page!</h3>
		<p class = "pl-2"> Please login as a registered user </p>';
	$body .= "<meta http-equiv='refresh' content='1'>";
	require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/body.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/footer.php");
endif;



