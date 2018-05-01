<?php
$content .= "
	<div class = 'jumbotron jumbotron-fluid'>
		<h1 class = 'text-center text-danger' id = 'contact'> Contact Us Settings </h1>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Company Address</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{addrData.id}}</td>
						<td>{{addrData.address}}</td>
						<td>{{addrData.phone}}</td>
						<td>{{addrData.email}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-6 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
		";
		$form = new createForm();
		$form->createText('Address', 'dest', 'text', $errors);
		$form->createText('Phone', 'phone', 'text', $errors);
		$form->createText('Email', 'email', 'text', $errors);
		$form->createSubmit('address', 'submit', 'Confirm');
		$address = $form->end();
		if(!isset($messages['address'])) $messages['address'] = '';
$content .= "
		{$address}
		<span class = 'text-success m-2'>{$messages['address']}</span>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col'>
			<h2 class = 'text-center'>Reservation</h2>
		</div>
	</div>
	<div class = 'row'>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-success m-2'> View </h3>
			<table class = 'table table-responsive table-hover table-borderless m-2'>
				<thead class = 'thead-light'>
					<tr>
						<th>ID</th>
						<th>Date</th>
						<th>Time</th>
						<th>Name</th>
						<th>Reserve</th>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat = 'r in reservationData'>
						<td>{{r.id}}</td>
						<td>{{r.date}}</td>
						<td>{{r.time}}</td>
						<td>{{r.name}}</td>
						<td>{{r.reserve}}</td>
						<td>{{r.description}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-info m-2'> Add </h3>
		";
		$form = new createForm();
		$form->createText('Event Date', 'add_event_date', 'text', $errors);
		$form->createText('Event Time', 'add_event_time', 'text', $errors);
		$form->createText('Event Name', 'add_event_name', 'text', $errors);
		$form->createText('Reserve', 'add_event_reserve', 'text', $errors);
		$form->createText('Description', 'add_event_desc', 'text', $errors);
		$form->createSubmit('add_reservation', 'submit', 'Add', 'btn-info');
		$add_reservation = $form->end();
		if(!isset($messages['add_reservation'])) $messages['add_reservation'] = '';
$content .= "
		{$add_reservation}
		<span class = 'text-success m-2'>{$messages['add_reservation']}</span>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-primary m-2'> Update </h3>
		";
		$form = new createForm();
		$form->createSelect('Event ID', 'update_event_id', $reservation_id, $errors);
		$form->createText('Event Date', 'update_event_date', 'text', $errors);
		$form->createText('Event Time', 'update_event_time', 'text', $errors);
		$form->createText('Event Name', 'update_event_name', 'text', $errors);
		$form->createText('Reserve', 'update_event_reserve', 'text', $errors);
		$form->createText('Description', 'update_event_desc', 'text', $errors);
		$form->createSubmit('update_reservation', 'submit', 'Update', 'btn-primary');
		$update_reservation = $form->end();
		if(!isset($messages['update_reservation'])) $messages['update_reservation'] = '';
$content .= "
		{$update_reservation}
		<span class = 'text-success m-2'>{$messages['update_reservation']}</span>
		</div>
		<div class = 'col-sm-3 card'>
			<h3 class = 'text-danger m-2'> Delete </h3>
		";
		$form = new createForm();
		$form->createSelect('Event ID', 'delete_event_id', $reservation_id, $errors);
		$form->createSubmit('delete_reservation', 'submit', 'Delete', 'btn-danger');
		$delete_reservation = $form->end();
		if(!isset($messages['delete_reservation'])) $messages['delete_reservation'] = '';
$content .= "
		{$delete_reservation}
		<span class = 'text-success m-2'>{$messages['delete_reservation']}</span>
		</div>
	</div>
";