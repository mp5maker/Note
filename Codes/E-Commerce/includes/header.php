<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8"/>
		<meta name = "viewport" content = "width=device-width,  initial-scale=1"/>
		<title>
		 	<?php $title = isset($page_title)? $page_title : "Knowledge is Power: And It Pays to Know";?>
		 	<?php echo $title; ?>
		</title>
			<link rel = "stylesheet" href = "/E-Commerce/vendor/bootstrap.min.css" media = "screen"/>
			<link rel = "stylesheet" href = "/E-Commerce/CSS/style.css" media = "screen"/>
			<script src = "/E-Commerce/vendor/jquery.min.js"></script>
			<script src = "/E-Commerce/vendor/popper.min.js"></script>
			<script src = "/E-Commerce/vendor/bootstrap.min.js"></script>
	</head>
	<body>
		<div class = "row" id = "wrap">
			<div class = "col header text-center bg-light">
				<h1>
					<a href = "index.php" class = "nounderline">
						<code class = "text-info">Knowledge is Power</code>
					</a>
				</h1>
				<h2>
					<code class = "text-warning">and it pays to know</code> 
				</h2>
			</div> 
		</div>
		<div class = "row">
			<nav id = "nav" class = "col navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
				<a class = "navbar-brand" href = "#">&nbsp;
					<code class = "text-warning">Code Break!</code>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse"
						 data-target="#collapsibleNavbar">
    					<span class="navbar-toggler-icon"></span>
   				</button>
   				<div class = "collapse navbar-collapse" id = "collapsibleNavbar">
					<ul class = "navbar-nav">
					<?php $pages = ["Home" => "index", "About" => "about", 
					                "Contact" => "contact", "Register" => "register"];
						$this_page = basename($_SERVER['PHP_SELF'], ".php"); 
					    foreach ($pages as $key => $value):
					    	if($value == $this_page):
								echo '<li class = "nav-item active">';
					    	else:	
								echo '<li class = "nav-item">';
					    	endif;
							echo '	<a href = "'.$value.'" class = "nav-link">';
							echo 		$key;
							echo '	</a>';
							echo '</li>';
					    endforeach;
					?>
					</ul>
				</div>
			</nav>
		</div>
		
		