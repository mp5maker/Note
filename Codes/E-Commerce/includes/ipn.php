<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/E-Commerce/includes/config.inc.php');
$request = 'cmd=_notify-validate';

foreach($_POST as $key => $value):
	$value = urlencode(stripslashes($value));
	$request .= "&$key=$value";
endforeach;


$fp = fsockopen('ssl://www.sandbox.paypal.com', 443, $errno, $errtsr, 30);

if($fp):
	$header = "POST/cgi-bin/webscrHTTP/1.1\r\n";
	$header .= "Content-Type:application/x-www-form-urlencoded\r\n";
	$header .= "Content-Length:".strlen($request)."\r\n";
	$header .= "Connection: Close\r\n";
	$header .= "Host: www.sandbox.paypal.com\r\n\r\n";
	fputs($fp, $header.$request);

	$from = "admin@sphotonkhan.com";
	$to = "khan.photon@gmail.com";
	$subject = "Response";
	$message = $request;
	$headers = "From:" . $from;
	if(mail($to,$subject,$message, $headers)):
        echo "Email sent.";
    else: 
        echo "Failed to send the email.";
    endif; 

	while(!feof($fp)):
		$response = fgets($fp, 1024);
		if(strcmp($response, "VERIFIED") == 0):
			if(isset($_POST['payment_status']) && $_POST['payment_status'] == 'Completed'):
				if($_POST['receiver_email'] == 'photonkhan@gmail.com'):
					if(($_POST['mc_gross'] == 10.00) && $_POST['mc_currency'] == 'USD'):
						if(!empty($_POST['txn_id'])):
							require(MYSQL);
							$txn_id = mysqli_real_escape_string($dbc, $_POST['txn_id']);
							$query = "SELECT id FROM orders WHERE transaction_id = '$txn_id'";
							$result = mysqli_query($dbc, $query);
							if(mysqli_num_rows($result) == 0):
								$e = isset($_POST['email'])? $_POST['email'] : '';
								$query = "SELECT id FROM users where email = '$e'";
								$result = mysqli_query($dbc, $query);
								while($row = mysqli_fetch_array($result)):
									$uid = $row['id'];
								endwhile;
								$status = mysqli_real_escape_string($dbc, $_POST['payment_status']);
								$amount = (float)$_POST['mc_gross'];
								$query = "INSERT INTO orders (user_id, transaction_id, payment_status, payment_amount)
								          VALUES('$uid', '$txn_id', '$status', '$amount')";
								$result = mysqli_query($dbc, $query);
								if(mysqli_affected_rows($dbc) == 1):
									if($uid > 0):
										$query = "UPDATE users SET date_expires = DATE_ADD(NOW(), INTERVAL 1 YEAR), date_modified = NOW()
												  WHERE id = '$uid'";
									    $result = mysqli_query($dbc, $query);
										if(mysqli_affected_rows($dbc) != 1):
											trigger_error("The user's expiration date could not be updated");
										endif;
									endif;
								endif;
							endif;	
						endif;
					endif;
				endif;
			endif;
		endif;
	endwhile;
else:
	trigger_error("Could not connect to the IPN");
endif;

