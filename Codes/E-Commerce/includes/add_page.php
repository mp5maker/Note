<?php
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/config.inc.php");
$page_title = "Add a Site Content Page";
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/header.php");
require(MYSQL);

$add_page_errors = array();
$add_page_success = false;	
if(isset($_SESSION['user_admin'])):

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_page'])):
		if(!empty(trim($_POST['title']))):
			$p_title = mysqli_real_escape_string($dbc, strip_tags($_POST['title']));
		else: 
			$add_page_errors['title'] = "Please enter the title!";
		endif;
		if(filter_var($_POST['category'], FILTER_VALIDATE_INT, ['min_range' => 1])):
			$category = $_POST['category'];
		else:
			$add_page_errors['category'] = "Please select a category";
		endif;	

		if(!empty(trim($_POST['description']))):
			$description = mysqli_real_escape_string($dbc, strip_tags($_POST['description']));
		else:
			$add_page_errors['description'] = "Please enter the description!";
		endif;

		if(!empty(trim($_POST['content']))):
			$allowed = '<div><p><span><br><a><img><h1><h2><h3><h3><h4><ul><li><blockquote><code><strong>';
			$content = mysqli_real_escape_string($dbc, strip_tags($_POST['content'], $allowed));
		else:
			$add_page_errors['content'] = "Please enter the content";
		endif;

		if(empty($add_page_errors)):
			$query = "INSERT INTO pages(category_id, title, description, content)
					  VALUES ('$category', '$p_title', '$description', '$content')";
			$result = mysqli_query($dbc, $query);
			if(mysqli_affected_rows($dbc) == 1):
				$add_page_success = true;
				$_POST = array();
			else:
				trigger_error("The page could not be added due to a system error. We apologize for the inconvenience!");
			endif;
		endif;
	endif;
	$body = "
			<h3 class = 'pl-2'>Add a Site Content Page</h3>
			<form class = 'pl-2' method = 'post' 
				  action = '".str_replace('_','-',basename($_SERVER['PHP_SELF'],'.php'))."'>
				<div class = 'form-group'>
					<label for = 'title'><strong>Title</strong></label>
					<input type = 'text' name = 'title' id = 'title' class = 'form-control' value ='";
						$body .= isset($p_title)? $p_title: '';
						$body .= "'/>";
						$body .= "
					<span class = 'text-danger'>";
						$body .= isset($add_page_errors['title'])? $add_page_errors['title']: '';
						$body .= "
					</span>
				</div>
				<div class = 'form-group'>
					<label for = 'category'><strong>Category</strong></label>
					<select name = 'category' class = 'form-control'>";
						$query = "SELECT id, category from categories ORDER BY category ASC";
						$result = mysqli_query($dbc, $query);
						while($row = mysqli_fetch_array($result)):
							$body .= "<option value = '".$row['id']."' ";
							$body .= (isset($_POST['category']) && $_POST['category'] == $row['id'])? "selected='selected'>" : '>';
							$body .= $row['category']."</option>";
						endwhile;
					$body .= "</select>
					<span class = 'text-danger'>";
							$body .= isset($add_page_errors['category'])? $add_page_errors['category'] : "";
							$body .= "
					</span>
				</div>
				<div class = 'form-group'>
					<label for = 'description'><strong>Description</strong></label>
					<textarea name = 'description' class = 'form-control' id = 'description'>";
						$body .= isset($description)? $description: '';
						$body .= "</textarea>";
						$body .= (isset($add_page_errors['description']))? 
								"<span class = 'text-danger'>".$add_page_errors['description']."</span>" : "";
						$body .= "
				</div>
				<div class = 'form-group'>
					<label for = 'content'><strong>Content</strong></label>
					<textarea name = 'content' class = 'form-control' id = 'content'>";
						$body .= isset($content)? $content: '';
						$body .= "</textarea>";
						$body .= (isset($add_page_errors['content']))? 
								"<span class = 'text-danger'>".$add_page_errors['content']."</span>" : "";
						$body .= "
				</div>
				<input type = 'submit' class = 'btn btn-success' name = 'add_page' value = 'Add this Page'/>
			</form>";
	$body .= "<script src = '/E-Commerce/vendor/tinymce/tinymce.min.js'></script>";
	$body .= "<script src = '/E-Commerce/js/add_page.js'></script>";
			if($add_page_success): 
				$body .= "<code class = 'text-success bg-dark'> The page has been added</code>";
			endif;
else:
	$body = "<h1 class = 'text-danger'> You are not authorized to enter this page!</h1>";
endif;
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/body.php");
require_once($_SERVER['DOCUMENT_ROOT']."/E-Commerce/includes/footer.php");
?>
				
					