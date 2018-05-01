<!DOCTYPE html>
<html lang = 'en'>
	<head>
		<title><?php if(isset($page_title)) echo $page_title?></title>
		<meta charset = 'UTF-8'/>
		<meta name = 'viewport' content = 'width=device-width, initial-scale=1'/>
		<link rel = 'stylesheet' href = '/cafe/vendor/bootstrap/bootstrap.min.css'/>
		<link rel = 'stylesheet' href = '/cafe/vendor/font-awesome/css/font-awesome.css'/>
		<link rel = 'stylesheet' href = '/cafe/vendor/fonts/ubuntu.css'/>
		<link rel = 'stylesheet' href = '/cafe/css/style.css'/>
		<script src = '/cafe/vendor/bootstrap/jquery.min.js'></script>
		<script src = '/cafe/vendor/bootstrap/popper.min.js'></script>
		<script src = '/cafe/vendor/bootstrap/bootstrap.min.js'></script>
		<script src = '/cafe/vendor/angular/angular.js'></script>
		<script src = '/cafe/vendor/google/chart.js'></script>
		<script src = '/cafe/admin/js/admin.js'></script>
 	</head>
	<body ng-app = 'myApp' data-spy = 'scroll' data-target = '.navbar' data-offset = '50'>
		<div class = 'row'>
			<div class = 'col bg-danger p-3 text-center'>
				<a class = 'text-white nounderline' href = '/cafe/index.php'>
					<img alt = 'Logo' height = '150' width = '150' ng-src = '{{logoData.src}}'/>
					<h1> {{websiteData.name}} </h1>
					<h2> Admin Panel </h2>
				</a>
			</div>
		</div>
		<?php if(isset($content)) echo $content;?>
	</body>
</html>