<?php
$content = "
		<nav class = 'bg-light ml-5 mt-5'>
			<ul class = 'navbar-nav'>
				<li class = 'nav-item'>
					<li class = 'nav-item dropdown'>
					      <a class = 'nav-link dropdown-toggle text-info' href = '#' id = 'navbardrop' data-toggle = 'dropdown'>
					        Products
					      </a>
					      <ul class = 'dropdown-menu'>
					        <li class = 'dropdown-item'>
					        	<a href = '/E-Commerce2/admin/add_coffees.php' class = 'nounderline'>Add Coffee Products</a>
					        </li>
					        <li class = 'dropdown-item'>
					       		<a href = '/E-Commerce2/admin/add_goodies.php' class = 'nounderline'>Add Non-Coffee Products</a>
					       	</li>
					        <li class = 'dropdown-item'>
					       		<a href = '/E-Commerce2/admin/add_inventory.php' class = 'nounderline'>Add Inventory</a>
					       	</li>
					      </ul>
					</li>
				</li>
				<li class = 'nav-item'>
					<a class = 'nav-link text-success' href = '/E-Commerce2/admin/create_sales.php'>
						Sales
					</a>
				</li>
				<li class = 'nav-item'>
					<a class = 'nav-link text-secondary' href = '/E-Commerce2/admin/view_orders.php'>
						Orders
					</a>
				</li>
				<li class = 'nav-item'>
					<a class = 'nav-link text-danger' href = '/E-Commerce2/admin/includes/admin_logout.php'>
						Log Out
					</a>
				</li>
			</ul>
		</nav>
";

