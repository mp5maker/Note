<?php
$content = "
<div class = 'row ml-2'>
	<div class = 'col'>
		<h1>Contact Us</h1>
	</div>
</div>
<div class = 'row ml-2 mb-3' ng-controller = 'addrCtrl'>
	<div class = 'col-sm-4 card'>
		<p>Contact us and we'll get back to you within 24 hours</p>
		<p>
			<i class = 'icon-map-marker'></i>
			{{addrData.address}}
		</p> 
		<p>
			<i class = 'icon-phone'></i>
			{{addrData.phone}}
		</p> 
		<p>
			<i class = 'icon-envelope'></i>
			{{addrData.email}}
		</p> 
	</div>
	<div class = 'col-sm-4 card'>
		<h3> Email Us </h3>
	";
	$form = new createForm();
	$form->createText('Full Name', 'name', 'text', $errors);
	$form->createText('Email', 'email', 'email', $errors);
	$form->createRadio('Gender', 'gender', ['male' => 'Male', 'female' => 'Female', 'Other' => 'Other'], $errors);
	$form->createSelect('Questions Regarding', 'question', ['reservation' => 'Reservation', 'complaint' => 'Complaint', 'jobopening' => 'Job Opening', 'aboutus' => 'About Us'], $errors);
	$form->createTextArea('Description', 'description', $errors);
	$form->createCaptcha('Captcha', 'captcha', '/cafe/includes/captcha.php',$errors);
	$form->createSubmit('email_submit', 'submit', 'Confirm', 'btn-success');
	$email_submit = $form->end();
	if(!isset($messages['email_submit'])) $messages['email_submit'] = '';
$content .= "
		{$email_submit}
		<span class = 'text-success'>{$messages['email_submit']}</span>
	</div>
	<div class = 'col-sm-4 card' ng-controller = 'reservationCtrl'>
		<img src = '/cafe/img/reservation.png' class = 'card-img-top'/>
		<div class = 'card-body text-center'>
				<h4 class = 'card-title'>Reservation</h4>
				<p class = 'card-text'>We take reservation everyday!</p>
		</div>
		<table class = 'table table-responsive-sm table-bordered table-striped table-hover'>
			<thead class = 'thead-light'>
				<tr>
					<th>Date</th>
					<th>Time</th>
					<th>Name</th>
					<th>Reserve</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody ng-repeat = 'r in reservationData'>
				<tr>
					<td>{{r.date}}</td>
					<td>{{r.time}}</td>
					<td>{{r.name}}</td>
					<td>{{r.reserve}}</td>
					<td>{{r.description}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<script src = '/cafe/js/contact_us.js'></script>
";