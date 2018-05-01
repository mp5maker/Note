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
		<script src = '/cafe/js/behaviour.js'></script>
 	</head>
	<body ng-app = 'myApp'>
		<div class = 'row'>
			<div class = 'col bg-danger p-3 text-center'>
				<a class = 'text-white nounderline' href = '/cafe/index.php'>
					<img alt = 'Logo' height = '150' width = '150' ng-src = '{{logoData}}'/>
					<h1> {{webData.name}} </h1>
				</a>
			</div>
		</div>
		<nav class = 'navbar navbar-expand-sm bg-dark navbar-dark sticky-top'>
			<a class = 'navbar-brand' href = '/cafe/index.php'>
					<i class = '{{brandData}}'></i>
			 </a>
			 <button class = 'navbar-toggler' type = 'button' data-toggle = 'collapse' data-target = '#navigation'>
			 		<span class = 'navbar-toggler-icon'></span>
			 </button>
			 <div id = 'navigation' class = 'collapse navbar-collapse'>
				<ul class = 'navbar-nav mx-auto'>
					<div ng-repeat = 'x in navData'> 
						<div ng-if = 'curPage == x.src'>
							<li class = 'nav-item active'>
								<a href = '{{x.src}}' class = 'nav-link'>
										<i class = '{{x.icon}}'></i>
											{{x.name}}
								</a>
							</li>
						</div>
						<div ng-if = 'curPage != x.src'>
							<li class = 'nav-item'>
								<a href = '{{x.src}}' class = 'nav-link'>
										<i class = '{{x.icon}}'></i>
											{{x.name}}
								</a>
							</li>
						</div>
				    </div>
				</ul>
			</div>
		</nav>
		<?php if(isset($content)) echo $content;?>
		<footer class = 'row'>
			<nav class = 'navbar bg-dark navbar-dark col navbar-expand-sm'>
				<ul class = 'navbar-nav mx-auto'>
					<li class = 'nav-item'>
						<a href = '#' class = 'nav-link'>
							&copy;{{footData.copy}}
						</a>
					</li>
				</ul>
			</nav>
		</footer>
	</body>
</html>