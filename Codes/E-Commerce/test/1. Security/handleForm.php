<?php 
session_start();
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'ecommerce1');


if($_SERVER['REQUEST_METHOD'] == 'POST'):
	if(isset($_SESSION['token']) && isset($_SESSION['agent'])):
		if(isset($_COOKIE['token']) && isset($_COOKIE['agent'])):
			if($_POST['submit']):
				if($_POST['token'] == $_SESSION['token']):
					if($_POST['agent'] == $_SESSION['agent']):
						if($_POST['token'] == $_COOKIE['token']):
							if($_POST['agent'] == $_COOKIE['agent']):
								$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
								$strip = $_POST['data'];
								$escape = mysqli_real_escape_string($connection, $strip);
								echo "You entered: ".$escape."<br/>";
								echo "Your token: ".$_POST['token']."<br/>";
								echo "Your agent: ".$_POST['agent']."<br/>";
								echo "Current agent: ".$_SERVER['HTTP_USER_AGENT']."<br/>";
							else:
								echo "Cookie Agent do not match";
							endif;
						else:
							echo "Cookie Token do not match";
						endif;
					else:
						echo "Session Agent do not match";
					endif;
				else: 
					echo "Session Token do not match";
				endif;
			else:
				echo "Form did not get submitted";
			endif;
		else:
			echo "Token and Agent Cookie is not set";
		endif;
	else:
		echo "Token and Agent Session is not set!";
	endif;
else:
	echo "It is not a post request!";
endif;

?>