<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/config.inc.php');
$page_title = "Add a PDF";
require_once($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/header.php');
require_once(MYSQL);

if(isset($_SESSION['user_admin'])):
	$add_pdf_errors = array();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload'])):
		if(empty($_POST['title'])):
			$add_pdf_errors['title'] = "Please enter the title!";
		else:
			$t = mysqli_real_escape_string($dbc, strip_tags($_POST['title']));
		endif;

		if(empty($_POST['description'])):
			$add_pdf_errors['description'] = "Please enter the description";
		else:
			$d = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['description'])));
		endif;
		if(is_uploaded_file($_FILES['pdf']['tmp_name']) && $_FILES['pdf']['error'] == UPLOAD_ERR_OK):
			$file = $_FILES['pdf'];
			$size = round($file['size']/1024);
			if($size > 1024):
				$add_pdf_errors['pdf'] = "The uploaded file was too large";
			else:
				if(($file['type'] != 'application/pdf') && substr($file['name'],-4) != ".pdf"):
					$add_pdf_errors['pdf'] = "The uploaded file was not a PDF";
				else:
					if(array_key_exists('pdf', $add_pdf_errors)):
						unlink($file['tmp_name']);
					else:
						if(empty($add_pdf_errors)):
							$file_name = $file['name'];
							$tmp_name = sha1($file['name'].uniqid("",true));
							$query = "INSERT INTO pdfs (tmp_name, title, description, file_name, size)
									  VALUES('$tmp_name', '$t', '$d', '$file_name', '$size')";
							$result = mysqli_query($dbc, $query);
							if(mysqli_affected_rows($dbc) == 1):
								move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/pdfs/'.$file_name);
								$success_message = "<p class = 'mt-2 ml-2 text-success'>Successfully PDF Uploaded!</p>";
							endif;
						endif;
					endif;
				endif;
			endif;
		else:
			switch($_FILES['pdf']['error']):
			case 1:
			break;

			case 2:
			$add_pdf_errors['pdf'] = "The uploaded file was too large";
			break;

			case 3:
			$add_pdf_errors['pdf'] = "The file was partially uploaded";
			break;

			case 4:
			break;
			
			case 5:
			break;
			
			case 6:
			break;

			case 7:
			break;

			case 8:
			$add_pdf_errors['pdf'] = "No file was uploaded!";
			break;

			default: 
			$add_pdf_errors['pdf'] = "No file was uploaded!";
			break;
			endswitch;
		endif;	
	endif;
	$body = "<h3 class = 'pl-2'> Add a PDF </h3>";
	$body .= "
			<form enctype = 'multipart/form-data' action = '".str_replace('_','-',basename($_SERVER['PHP_SELF'],'.php'))."' method = 'post' class = 'pl-2'>";
	    $body .= "<input type = 'hidden' class = 'form-control' name = 'MAX_FILE_SIZE' value = '1048576'/>";
		$body .= "<div class = 'form-group'>
						<label for = 'title'><strong>Title</strong></label>
						<input type = 'text' name = 'title' id = 'title' class = 'form-control' value ='";
							$body .= isset($t)? $t: '';
							$body .= "'/>";
							$body .= "
						<span class = 'text-danger'>";
							$body .= isset($add_pdf_errors['title'])? $add_pdf_errors['title']: '';
							$body .= "
					    </span>
				  </div>";
		$body .= "<div class = 'form-group'>
							<label for = 'title'><strong>Description</strong></label>
							<textarea = 'text' name = 'description' id = 'description' class = 'form-control'>";
								$body .= isset($d)? $d: '';
								$body .= "</textarea>";
								$body .= "
							<span class = 'text-danger'>";
								$body .= isset($add_pdf_errors['description'])? $add_pdf_errors['description']: '';
								$body .= "
						    </span>
					  </div>";
		$body .= "<div class = 'form-group'>
					 <label for = 'pdf'> PDF </label>
					 <input type = 'file' class = 'form-control' id = 'pdf' name = 'pdf'/>
					<span class = 'text-danger'>";
						$body .= isset($add_pdf_errors['pdf'])? $add_pdf_errors['pdf']: '';
						$body .= "
				    </span>
				  </div>";
	    $body .= "<input type = 'submit' class = 'btn btn-success' name = 'upload' value = 'Add a PDF'/>";
	$body .= "</form>";
	$body .= isset($success_message)? $success_message: '';
	require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/body.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/footer.php");
endif;
?>

