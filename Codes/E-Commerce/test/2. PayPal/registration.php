<!DOCTYPE html>
<html>
	<head>
		<title> Paypal Integration Test</title>
		<meta charset = "UTF-8"/>
		<meta name = "viewport" content = "width=device-width, initial-scale=1">
	</head>
	<body>
	</body>
		<?php $return_url = urlencode(stripcslashes('http://sphotonkhan.com/E-Commerce/test/thanks.php')); ?>
		<?php $cancel_url = urlencode(stripslashes('http://sphotonkhan.com/E-Commerce/test/cancel.php')); ?>
		<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type = "hidden" name = "custom" value = "Photon Khan"/>
			<input type = "hidden" name = "email" value = "khan.photon@gmail.com"/>
			<input type = "hidden" name = "return" value = "<?php $return_url; ?>"/>
			<input type = "hidden" name = "cancel_return" value = "<?php $cancel_url; ?>"/>
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="HXR2K5JUG864L">
			<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
</html>


