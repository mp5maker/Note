<?php 
require_once("common/constants.php");
require_once("common/database.php");

$connection = mysqli_connect($server_name, $user_name, $password, $db_name)
              or die("Server Denied");
if(isset($_COOKIE['username']) && isset($_COOKIE['user_id'])):
echo "<!doctype html>";
echo " <html>";
echo " 	<head>";
echo " 		<title> Home Page </title>";
echo " 		<meta charset = 'UTF-8'/>";
echo " 	</head>";
echo " 	<body>";
echo "    <h1> Mismatch - Leave the Love Ones Behind </h1>";
echo " 		<p> You are in logged in as ".$_COOKIE['username']
              .",<a href = 'logoutsession.php'> Log Out</a>" 
              ."</p>";
$query = "SELECT * FROM mismatch_user WHERE user_id =".$_COOKIE['user_id'];
$result = mysqli_query($connection, $query) or die("Query Denied");
while($row = mysqli_fetch_array($result)){
  echo "   <table>";
  echo "      <tr>";
  echo "        <th></th>";
  echo "        <th></th>";
  echo "      </tr>";
  echo "      <tr>";
  echo "          <td>";
  echo "             <p> Username: </p>";
  echo "             <p> First Name: </p>";
  echo "             <p> Last Name: </p>";
  echo "             <p> Join Date: </p>";
  echo "             <p> Birth Date: </p>";
  echo "             <p> City: </p>";
  echo "             <p> State: </p>";
  echo "          </td>";
  echo "          <td>";
  echo               "<p>".$row['username']."</p>";
  echo               "<p>".$row['first_name']."</p>";
  echo               "<p>".$row['last_name']."</p>";
  echo               "<p>".$row['join_date']."</p>";
  echo               "<p>".$row['birth_date']."</p>";
  echo               "<p>".$row['city']."</p>";
  echo               "<p>".$row['state']."</p>";
  echo "          </td>";
  echo "      </tr>";
  echo "   </table>";
  echo " <p>Photo</p>"; 
  echo " <img src = '".UPLOAD_PATH.$row['picture']."' alt = 'profile photo'"."height = '100px' width = '100px'/>"; 
}
echo "<p> Would you like to <a href = 'edit.php'>edit</a> your profile?</p>";            
echo "<p> <a href = 'homesession.php'>Home</a></p>";            
echo "  </body>";
echo " </html>";
endif;
?>