<?php 
$request = "cmd=_notify-validate";
foreach($_POST as $key => $value):
	$value = urlencode(stripslashes($value));
	$request .= "&$key=$value";
endforeach;

$fp = fsockopen("ssl://www.sandbox.paypal.com", 443, $errno, $errstr, 30);
if(!$fp):
	trigger_error("Could not connect for the IPN!");
else:
	$header = "POST/cgi-bin/webscrHTTP/1.0\r\n";
	$header .= "Content-Type:application/x-www-form-urlencoded\r\n";
	$header .= "Content-Length:".strlen($request)."\r\n";
	$header .= "Connection: Close\r\n";
	$header .= "Host: www.paypal.com\r\n\r\n";
	fputs($fp, $header.$request);
endif;

while(!feof($fp)):
	$response = fgets($fp, 1024);
	if(strcmp($response, "VERIFIED") == 0):
		ini_set('allow_url_fopen', '1');
		$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
		$txt = "John Doe\n";
		fwrite($myfile, $txt);
		$txt = "Jane Doe\n";
		fwrite($myfile, $txt);
		fclose($myfile);
	endif;
endwhile;

