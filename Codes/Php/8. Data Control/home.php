<?php 
require_once("common/constants.php");
require_once("common/database.php");
require_once("common/sessionstarter.php");

$connection = mysqli_connect($server_name, $user_name, $password, $db_name)
              or die("Server Denied");

echo "<!doctype html>";
echo " <html>";
echo " 	<head>";
echo " 		<title> Home Page </title>";
echo " 		<meta charset = 'UTF-8'/>";
echo " 	</head>";
echo " 	<body>";
echo " 		<h1> Mismatch - Leave the Love Ones Behind </h1>";

if(!isset($_COOKIE['username'])){
    echo "<p><a href = 'login.php'>Log In</a>/<a href = 'signup.php'>Sign Up</a></p>";
}
else{
    echo "<p><a href = 'view.php'>View</a>/<a href = 'edit.php'>Edit</a></p>";
    echo "<p><a href = 'logout.php'>Log Out</a></p>";
}

echo " 		<table>";
echo " 		   <tr>";
echo " 		   	 <th> Latest Members</th>";
echo " 		   	 <th></th>";
echo " 		   </tr>";
$query = "SELECT first_name, last_name, picture FROM mismatch_user ORDER BY join_date DESC LIMIT 5";
$result = mysqli_query($connection, $query) or die("Query Denied");
while($row = mysqli_fetch_array($result)){
    echo "<tr>";
	echo " <td>".$row['first_name']." ".$row['last_name']."</td>";
	echo " <td><img src = '".UPLOAD_PATH.$row['picture']."' alt = 'profile photo'"
           ."height = '50px' width = '50px'" 
	       ."</td>";
    echo "</tr>";
}                
echo " 		</table>";
echo " 	</body>";
echo " </html>";
require_once("templates/pagefooter.php");
?>
