<!DOCTYPE html>
<html lang = 'en'>
	<head>
		<title>
			<?php if(isset($page_title)): echo $page_title ?> 
			<?php else: echo "Coffee - or not!" ?> 
			<?php endif; ?> 
		</title>
		<meta charset = 'UTF-8'/>
		<meta name = 'viewport' content = 'width=device-width, initial-scale=1'/>
		<link rel = 'stylesheet' href = '/E-Commerce2/vendor/bootstrap/bootstrap.min.css'/>
		<link rel = 'stylesheet' href = '/E-Commerce2/vendor/fonts/indie-flower.css'/>
		<link rel = 'stylesheet' href = '/E-Commerce2/vendor/font-awesome/css/font-awesome.css'/>
		<link rel = 'stylesheet' href = '/E-Commerce2/css/style.css'/>
		<script src = '/E-Commerce2/vendor/bootstrap/jquery.min.js' ></script>
		<script src = '/E-Commerce2/vendor/bootstrap/popper.min.js' ></script>
		<script src = '/E-Commerce2/vendor/bootstrap/bootstrap.min.js' ></script>
		<script src = '/E-Commerce2/vendor/angular/angular.js' ></script>
		<script src = '/E-Commerce2/js/common.js' ></script>
	</head>
	<body ng-app = 'myApp'>
		<div class = 'row'>
			<div class = 'col text-center pt-3 pb-3' id = 'header-background'>
				<a href = '{{indexURL}}' class = 'nounderline'>
					<img src = '/E-Commerce2/images/coffee.jpg' alt = 'coffee-header' width = '100' height = '75' class = 'rounded-circle coffee-banner'/>
					<h1 class = 'text-white'> Coffee Raid </h1>
				</a>
			</div>
		</div>
		<?php if(isset($content)) echo $content;?>
		<nav class = 'navbar navbar-expand-sm sticky-bottom mt-5'>
			<ul class = 'navbar-nav mx-auto'>
				<li class = 'navbar-item'>
					&copy; <?php echo date('Y');?> All Rights Reserved | Coffee Raid | Designed By Photon
				</li>
			</ul>
		</nav>
	</body>
</html>