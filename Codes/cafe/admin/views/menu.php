<?php
$content .= "
	<div class = 'jumbotron jumbotron-fluid'>
		<h1 class = 'text-center text-danger' id = 'menu'> Menu Page Settings </h1>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Menu</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Reference</th>
						<th>Image Source</th>
						<th>Name</th>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat = 'm in menuData'>
						<td>{{m.id}}</td>
						<td>{{m.href}}</td>
						<td>{{m.src}}</td>
						<td>{{m.name}}</td>
						<td>{{m.desc}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-info m-2'> Add </h3>
			<p class = 'm-2'>
				<code>Go to Administrative to</code>
				<a href = '#administrative' class = 'nounderline'> upload image </a>
			</p>
		";
		$str = 'abcdefghiklmnopqrstuvwxyz';
		$shuffled = str_shuffle($str);
		$form = new createForm();
		$form->createHidden('menu_href', $shuffled);
		$form->createSelect('Image Source', 'menu_src', $image_list, $errors);
		$form->createText('Menu Name', 'menu_name', 'text', $errors);
		$form->createText('Description', 'menu_desc', 'text', $errors);
		$form->createSubmit('add_menu', 'submit', 'Add', 'btn-info');
		$add_menu = $form->end();
		if(!isset($messages['add_menu'])) $messages['add_menu'] = '';
$content .= "
		{$add_menu}
		<span class = 'text-success m-2'>{$messages['add_menu']}</span>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
			<p class = 'm-2'>
				<code>Go to Administrative to</code>
				<a href = '#administrative' class = 'nounderline'> upload image </a>
			</p>
		";
		$str = 'abcdefghiklmnopqrstuvwxyz';
		$shuffled = str_shuffle($str);
		$form = new createForm();
		$form->createSelect('Menu ID', 'update_menu_id', $menu_id, $errors);
		$form->createHidden('menu_update_href', $shuffled);
		$form->createSelect('Image Source', 'menu_update_src', $image_list, $errors);
		$form->createText('Menu Name', 'menu_update_name', 'text', $errors);
		$form->createText('Description', 'menu_update_desc', 'text', $errors);
		$form->createSubmit('update_menu', 'submit', 'Update', 'btn-primary');
		$update_menu = $form->end();
		if(!isset($messages['update_menu'])) $messages['update_menu'] = '';
$content .= "
		{$update_menu}
		<span class = 'text-success m-2'>{$messages['update_menu']}</span>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-danger m-2'> Delete </h3>
		";
		$form = new createForm();
		$form->createSelect('Menu ID', 'delete_menu_id', $menu_id, $errors);
		$form->createSubmit('delete_menu', 'submit', 'Delete', 'btn-danger');
		$delete_menu = $form->end();
		if(!isset($messages['delete_menu'])) $messages['delete_menu'] = '';
		
$content .= "
		{$delete_menu}
		<span class = 'text-success m-2'>{$messages['delete_menu']}</span>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Sub Menu</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Category ID</th>
						<th>Image Source</th>
						<th>Name</th>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat = 'sm in submenuData'>
						<td>{{sm.sub_id}}</td>
						<td>{{sm.id}}</td>
						<td>{{sm.src}}</td>
						<td>{{sm.name}}</td>
						<td>{{sm.desc}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-info m-2'> Add </h3>
		";
		$form = new createForm();
		$form->createSelect('Under which Menu Item', 'submenu_cat_id', $menu_name, $errors);
		$form->createText('Sub Menu Name', 'submenu_name', 'text', $errors);
		$form->createSelect('Image Source', 'submenu_src', $image_list, $errors);
		$form->createText('Description', 'submenu_desc', 'text', $errors);
		$form->createSubmit('add_submenu', 'submit', 'Add', 'btn-info');
		$add_submenu = $form->end();
		if(!isset($messages['add_submenu'])) $messages['add_submenu'] = '';
$content .= "
		{$add_submenu}
		<span class = 'text-success m-2'>{$messages['add_submenu']}</span>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
		";
		$form = new createForm();
		$form->createSelect('Category', 'update_sub_cat_id', $menu_name, $errors);
		$form->createSelect('Sub Menu Item', 'update_submenu_id', $submenu_name, $errors);
		$form->createText('Sub Menu Name', 'update_sub_name', 'text', $errors);
		$form->createSelect('Image Source', 'update_sub_src', $image_list, $errors);
		$form->createText('Description', 'update_sub_desc', 'text', $errors);
		$form->createSubmit('update_submenu', 'submit', 'Update', 'btn-primary');
		$update_submenu = $form->end();
		if(!isset($messages['update_submenu'])) $messages['update_submenu'] = '';
$content .= "
		{$update_submenu}
		<span class = 'text-success m-2'>{$messages['update_submenu']}</span>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-danger m-2'> Delete </h3>
		";
		$form = new createForm();
		$form->createSelect('Sub Menu Item', 'delete_submenu_id', $submenu_name, $errors);
		$form->createSubmit('delete_submenu', 'submit', 'Delete', 'btn-danger');
		$delete_submenu = $form->end();
		if(!isset($messages['delete_submenu'])) $messages['delete_submenu'] = '';
$content .= "
		{$delete_submenu}
		<span class = 'text-success m-2'>{$messages['delete_submenu']}</span>
		</div>
	</div>
";