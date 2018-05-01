<?php
$content .= "
	<div class = 'jumbotron jumbotron-fluid'>
		<h1 class = 'text-center text-danger' id = 'common'> Common Settings </h1>
	</div>

	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Website Name</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Website Name</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{websiteData.id}}</td>
						<td>{{websiteData.name}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
		";
			$form = new createForm();
			$form->createText('Website Name', 'name', 'text', $errors);
			$form->createSubmit('website', 'submit', 'Confirm');
			$website = $form->end();
			if(!isset($messages['website'])) $messages['website'] = '';
$content .= "
			{$website}
			<span class = 'text-success m-2'>{$messages['website']}</span>
		</div>
	</div>

	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Navigation</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Navigation Item</th>
						<th>Route</th>
						<th>Icon</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat = 'nav in navData'>
						<td>{{nav.id}}</td>
						<td>{{nav.name}}</td>
						<td>{{nav.src}}</td>
						<td>{{nav.icon}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
			<h4 class = 'm-2'><i id = 'show_nav'></i></h4>
		";
		$form = new createForm();
		$form->createSelect('Navigation ID', 'update_nav_id', $navigation_id, $errors);
		$form->createText('Navigation Item', 'update_nav_name', 'text', $errors);
		$form->createSelect('Icon', 'update_nav_icon', $icons_list, $errors);
		$form->createSubmit('update_navigation', 'submit', 'Update', 'btn-primary');
		$update_navigation = $form->end();
		if(!isset($messages['update_navigation'])) $messages['update_navigation'] = '';
$content .= "
		{$update_navigation}
		<span class = 'text-success m-2'>{$messages['update_navigation']}</span>
		</div>
	</div>

	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Logo</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Image Source</th>
						<th>Alternative</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{logoData.id}}</td>
						<td>{{logoData.src}}</td>
						<td>{{logoData.alt}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
			<p class = 'm-2'>
				<code>Go to Administrative to</code>
				<a href = '#administrative' class = 'nounderline'> upload image </a>
			</p>
	";
		
		$form = new createForm(); 
		$form->createSelect("Select Image", "select_logo", $image_list, $errors);
		$form->createSubmit("select_logo_submit", "submit", "Confirm");
		$select_logo = $form->end();
		if(!isset($messages['select_logo'])) $messages['select_logo'] = '';
$content .= "
		{$select_logo}
		<span class = 'text-success m-2'>{$messages['select_logo']}</span>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Brand</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Image Source</th>
						<th>Alternative</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{brandData.id}}</td>
						<td>{{brandData.src}}</td>
						<td>{{brandData.alt}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
	";
		$form = new createForm();
		$form->createSelect('Select Brand', 'select_brand', $icons_list, $errors);
		$form->createSubmit('select_brand_submit', 'submit', 'Confirm');
		$select_brand = $form->end();
		if(!isset($messages['select_brand'])) $messages['select_brand'] = '';

$content .= "
		<h4 class = 'm-2'><i id = 'show_brand'></i></h4>
		{$select_brand}
		<span class = 'text-success m-2'>{$messages['select_brand']}</span>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Footer</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Copyright</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{footData.id}}</td>
						<td>{{footData.copy}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
";
			$form = new createForm();
			$form->createText('Footer', 'copy', 'text', $errors);
			$form->createSubmit('footer', 'submit', 'Confirm');
			$footer = $form->end();
			if(!isset($messages['footer'])) $messages['footer'] = '';
$content .= "
			{$footer}
			<span class = 'text-success m-2'>{$messages['footer']}</span>
		</div>
	</div>
";