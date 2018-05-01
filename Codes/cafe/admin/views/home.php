<?php
$content .= "
	<div class = 'jumbotron jumbotron-fluid'>
		<h1 class = 'text-center text-danger' id = 'home'> Home Page Settings </h1>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Home</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Title One</th>
						<th>First Line (One)</th>
						<th>Second Line (One)</th>
						<th>Title Two</th>
						<th>Description (Two)</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{homeData.id}}</td>
						<td>{{homeData.title1}}</td>
						<td>{{homeData.desc11}}</td>
						<td>{{homeData.desc12}}</td>
						<td>{{homeData.title2}}</td>
						<td>{{homeData.desc2}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
	";
			$form = new createForm();
			$form->createText('Title One', 'title1', 'text', $errors);
			$form->createText('Description Line 1', 'desc11', 'text', $errors);
			$form->createText('Description Line 2', 'desc12', 'text', $errors);
			$form->createText('Title Two', 'title2', 'text', $errors);
			$form->createText('Description 2', 'desc2', 'text', $errors);
			$form->createSubmit('home', 'submit', 'Confirm');
			$home = $form->end();
			if(!isset($messages['home'])) $messages['home'] = '';

$content .= "
			{$home}
			<span class = 'text-success m-2'>{$messages['home']}</span>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Reason</h2>
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
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat = 'r in reasonData'>
						<td>{{r.id}}</td>
						<td>{{r.src}}</td>
						<td>{{r.desc}}</td>
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
			$form->createSelect('Choose', 'reason_id', [1 => 1, 2 => 2, 3 => 3], $errors);
			$form->createSelect('Image Source', 'reason_src', $image_list, $errors);
			$form->createText('Description', 'reason_desc', 'text', $errors);
			$form->createSubmit('reason', 'submit', 'Confirm');
			$reason = $form->end();
			if(!isset($messages['reason'])) $messages['reason'] = '';

$content .= "
			{$reason}
			<span class = 'text-success m-2'>{$messages['reason']}</span>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Promotion</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Image Source</th>
						<th>Price</th>
						<th>Sale Price</th>
						<th>Description</th>
						<th>Starting Date</th>
						<th>Ending Date</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat = 'p in promoData'>
						<td>{{p.id}}</td>
						<td>{{p.name}}</td>
						<td>{{p.src}}</td>
						<td>{{p.price}}</td>
						<td>{{p.sale_price}}</td>
						<td>{{p.desc}}</td>
						<td>{{p.date_start}}</td>
						<td>{{p.date_end}}</td>
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
		$form = new createForm();
		$form->createText('Promotion Name', 'add_promo_name', 'text', $errors);
		$form->createNumber('Price', 'add_promo_price', $errors);
		$form->createNumber('Sale Price', 'add_promo_sale_price', $errors);
		$form->createText('Description', 'add_promo_desc', 'text', $errors);
		$form->createSelect('Image Source', 'add_promo_image', $image_list, $errors);
		$form->createText('Date Start', 'add_promo_start', 'date', $errors);
		$form->createText('Date End', 'add_promo_end', 'date', $errors);
		$form->createSubmit('add_promotion', 'submit', 'Add', 'btn-info');
		$add_promotion = $form->end();
		if(!isset($messages['add_promotion'])) $messages['add_promotion'] = '';
$content .= "
		{$add_promotion}
		<span class = 'text-success m-2'>{$messages['add_promotion']}</span>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
			<p class = 'm-2'>
				<code>Go to Administrative to</code>
				<a href = '#administrative' class = 'nounderline'> upload image </a>
			</p>
		";
		$form = new createForm();
		$form->createSelect('Promotion Name', 'update_promo_id', $promotion_name, $errors);
		$form->createText('Promotion Name', 'update_promo_name', 'text', $errors);
		$form->createNumber('Price', 'update_promo_price', $errors);
		$form->createNumber('Sale Price', 'update_promo_sale_price', $errors);
		$form->createText('Description', 'update_promo_desc', 'text', $errors);
		$form->createSelect('Image Source', 'update_promo_image', $image_list, $errors);
		$form->createText('Date Start', 'update_promo_start', 'date', $errors);
		$form->createText('Date End', 'update_promo_end', 'date', $errors);
		$form->createSubmit('update_promotion', 'submit', 'Update', 'btn-primary');
		$update_promotion = $form->end();
		if(!isset($messages['update_promotion'])) $messages['update_promotion'] = '';
$content .= "
		{$update_promotion}
		<span class = 'text-success m-2'>{$messages['update_promotion']}</span>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-danger m-2'> Delete </h3>
		";
		$form = new createForm();
		$form->createSelect('Promotion Name', 'delete_promo_id', $promotion_name, $errors);
		$form->createSubmit('delete_promotion', 'submit', 'Delete', 'btn-danger');
		if(!isset($messages['delete_promotion'])) $messages['delete_promotion'] = '';
		$delete_promotion = $form->end();
$content .= "
		{$delete_promotion}
		<span class = 'text-success m-2'>{$messages['delete_promotion']}</span>
		</div>
	</div>
";