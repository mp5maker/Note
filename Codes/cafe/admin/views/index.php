<?php
$content .= "
	<div class = 'jumbotron jumbotron-fluid'>
		<h1 class = 'text-center text-danger' id = 'index'> Index Page Settings </h1>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>About</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{aboutData.id}}</td>
						<td>{{aboutData.title}}</td>
						<td>{{aboutData.desc}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
	";
			$form = new createForm();
			$form->createText('Index Title', 'update_about_title', 'text', $errors);
			$form->createText('Small Description', 'update_about_desc', 'text', $errors);
			$form->createSubmit('about', 'submit', 'Confirm');
			$about = $form->end();
			if(!isset($messages['about'])) $messages['about'] = '';
$content .= "
			{$about}
			<span class = 'text-success m-2'>{$messages['about']}</span>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Chart Options</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>3D</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{chartOptData.id}}</td>
						<td>{{chartOptData.title}}</td>
						<td>{{chartOptData.is3D}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
		";
			$form = new createForm();
			$form->createText('Chart Title', 'title', 'text', $errors);
			$form->createSelect('3D', 'is3D', ['true' => 'Yes', 'false' => 'No'], $errors);
			$form->createSubmit('chartoptions', 'submit', 'Confirm');
			$chartoptions = $form->end();
			if(!isset($messages['chartoptions'])) $messages['chartoptions'] = '';
$content .= "
			{$chartoptions}
			<span class = 'text-success m-2'>{$messages['chartoptions']}</span>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Chart Data</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>Reason</th>
						<th>Amount</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat = 'chart in chartInfo'>
						<td>{{chart[1]}}</td>
						<td>{{chart[0]}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-info m-2'> Add </h3>
		";
		$form = new createForm();
		$form->createText('Reason', 'add_reason', 'text', $errors);
		$form->createText('Amount', 'add_amount', 'number', $errors);
		$form->createSubmit('add_chart_data', 'submit', 'Add', 'btn-info');
		$add_chart_data = $form->end();
		if(!isset($messages['add_chart_data'])) $messages['add_chart_data'] = '';
$content .= "
		{$add_chart_data}
		<span class = 'text-success m-2'>{$messages['add_chart_data']}</span>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
		";
		$form = new createForm();
		$form->createSelect('Reason', 'update_reason', $chart_reason, $errors);
		$form->createText('Amount', 'update_amount', 'number', $errors);
		$form->createSubmit('update_chart_data', 'submit', 'Update', 'btn-primary');
		$update_chart_data = $form->end();
		if(!isset($messages['update_chart_data'])) $messages['update_chart_data'] = '';
$content .= "
		{$update_chart_data}
		<span class = 'text-success m-2'>{$messages['update_chart_data']}</span>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-danger m-2'> Delete </h3>
		";
		$form = new createForm();
		$form->createSelect('Reason', 'delete_reason', $chart_reason, $errors);
		$form->createSubmit('delete_chart_data', 'submit', 'Delete', 'btn-danger');
		$delete_chart_data = $form->end();
		if(!isset($messages['delete_chart_data'])) $messages['delete_chart_data'] = '';
$content .= "
		{$delete_chart_data}
		<span class = 'text-danger m-2'>{$messages['delete_chart_data']}</span>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Notice</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Opening Time</th>
						<th>Closing Time</th>
						<th>Notice</th>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{noticeData.id}}</td>
						<td>{{noticeData.open}}</td>
						<td>{{noticeData.close}}</td>
						<td>{{noticeData.notice}}</td>
						<td>{{noticeData.description}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
	";
			$form = new createForm();
			$form->createText('Opening Time', 'open', 'text', $errors);
			$form->createText('Closing Time', 'close', 'text', $errors);
			$form->createText('Notice', 'not', 'text', $errors);
			$form->createText('Description', 'description', 'text', $errors);
			$form->createSubmit('notice', 'submit', 'Confirm');
			$notice = $form->end();
			if(!isset($messages['notice'])) $messages['notice'] = '';
$content .= "
			{$notice}
			<span class = 'text-success m-2'>{$messages['notice']}</span>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Quotes Data</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Quote</th>
						<th>By</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat = 'quote in quoteData'>
						<td>{{quote.id}}</td>
						<td>{{quote.quote}}</td>
						<td>{{quote.name}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-info m-2'> Add </h3>
		";
		$form = new createForm();
		$form->createText('Quote', 'quote', 'text', $errors);
		$form->createText('By', 'quote_by', 'text', $errors);
		$form->createSubmit('add_quote', 'submit', 'Add', 'btn-info');
		$add_quote = $form->end();
		if(!isset($messages['add_quote'])) $messages['add_quote'] = '';
$content .= "
		{$add_quote}
		<span class = 'text-success m-2'>{$messages['add_quote']}</span>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
		";
		$form = new createForm();
		$form->createSelect('ID', 'quote_id', $quote_id, $errors);
		$form->createText('Quote', 'add_quote_desc', 'text', $errors);
		$form->createText('By', 'add_quote_by', 'text', $errors);
		$form->createSubmit('update_quote', 'submit', 'Confirm');
		$update_quote = $form->end();
		if(!isset($messages['update_quote'])) $messages['update_quote'] = '';
$content .= "
		{$update_quote}
		<span class = 'text-success m-2'>{$messages['update_quote']}</span>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-danger m-2'> Delete </h3>
		";
		$form = new createForm();
		$form->createSelect('ID', 'delete_quote_id', $quote_id, $errors);
		$form->createSubmit('delete_quote', 'submit', 'Delete', 'btn-danger');
		$delete_quote = $form->end();
		if(!isset($messages['delete_quote'])) $messages['delete_quote'] = '';
$content .= "
		{$delete_quote}
		<span class = 'text-danger m-2'>{$messages['delete_quote']}</span>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Service Data Row One</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Description</th>
						<th>Icon</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat = 's1 in serv1Data'>
						<td>{{s1.id}}</td>
						<td>{{s1.title}}</td>
						<td>{{s1.desc}}</td>
						<td>{{s1.icon}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
			<h4 class = 'm-2'><i id = 'show_service_one'></i></h4>
		";
		$form = new createForm();
		$form->createSelect('Choose', 'service_one_id', [1 => 1, 2 => 2, 3 => 3], $errors);
		$form->createText('Service Title', 'service_title_1', 'text', $errors);
		$form->createText('Description', 'service_desc_1', 'text', $errors);
		$form->createSelect('Icon', 'service_icon_1', $icons_list, $errors);
		$form->createSubmit('service_one', 'submit', 'Confirm');
		$service_one = $form->end();
		if(!isset($messages['service_one'])) $messages['service_one'] = '';
$content .= "
		{$service_one}
		<span class = 'text-success m-2'>{$messages['service_one']}</span>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Service Data Row Two</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Description</th>
						<th>Icon</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat = 's2 in serv2Data'>
						<td>{{s2.id}}</td>
						<td>{{s2.title}}</td>
						<td>{{s2.desc}}</td>
						<td>{{s2.icon}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
			<h4 class = 'm-2'><i id = 'show_service_two'></i></h4>
		";
		$form = new createForm();
		$form->createSelect('Choose', 'service_two_id', [1 => 1, 2 => 2, 3 => 3], $errors);
		$form->createText('Service Title', 'service_title_2', 'text', $errors);
		$form->createText('Description', 'service_desc_2', 'text', $errors);
		$form->createSelect('Icon', 'service_icon_2', $icons_list, $errors);
		$form->createSubmit('service_two', 'submit', 'Confirm');
		$service_two = $form->end();
		if(!isset($messages['service_two'])) $messages['service_two'] = '';

$content .= "
		{$service_two}
		<span class = 'text-success m-2'>{$messages['service_two']}</span>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Portfolio</h2>
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
						<th>Title</th>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat = 'port in portData'>
						<td>{{port.id}}</td>
						<td>{{port.src}}</td>
						<td>{{port.alt}}</td>
						<td>{{port.title}}</td>
						<td>{{port.desc}}</td>
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
		$form->createSelect('Choose', 'portfolio_id', [1 => 1, 2 => 2, 3 => 3], $errors);
		$form->createSelect('Image Source', 'portfolio_src', $image_list, $errors);
		$form->createText('Title', 'portfolio_title', 'text', $errors);
		$form->createText('Description', 'portfolio_desc', 'text', $errors);
		$form->createSubmit('portfolio', 'submit', 'Confirm');
		$portfolio = $form->end();
		if(!isset($messages['portfolio'])) $messages['portfolio'] = '';

$content .= "
		{$portfolio}
		<span class = 'text-success m-2'>{$messages['portfolio']}</span>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Location</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Latitude</th>
						<th>Longitude</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{locationData.id}}</td>
						<td>{{locationData.lat}}</td>
						<td>{{locationData.long}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
	";
			$form = new createForm();
			$form->createText('Latitude', 'latitude', 'text', $errors);
			$form->createText('Longitude', 'longitude', 'text', $errors);
			$form->createSubmit('location', 'submit', 'Confirm');
			$location = $form->end();
			if(!isset($messages['location'])) $messages['location'] = '';
$content .= "
			{$location}
			<span class = 'text-success m-2'>{$messages['location']}</span>
		</div>
	</div>
";