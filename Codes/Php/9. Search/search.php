<?php 
require_once("common/database.php");
$connection = mysqli_connect(SERVER, USER, PASS, DB);

echo "<!doctype html>";
echo " <html>";
echo " 	<head>";
echo " 	  <title> Job Search Engine </title>";
echo " 	  <meta charset = 'UTF-8'/>";
echo " 	</head>";
echo " 	<body>";
echo " 		<form method = 'post' action = '".$_SERVER['PHP_SELF']."'>";
echo " 			<label for = 'search'> Jobs, that you are looking for? </label><br/>";
                 $search = !empty($_POST['search'])? $_POST['search'] : '';
echo "           <input type = 'text' name = 'search' value = '$search'/>";

echo " 			<input type = 'submit' name = 'submit' value = 'Search'/>";
echo " 		</form>";
echo " 	</body>";
echo " </html>";


if(isset($_POST['submit'])):
    if(!empty($_POST['search'])){
        $search = mysqli_real_escape_string($connection, trim($_POST['search']));
        $query = "SELECT * FROM riskyjobs WHERE description LIKE '%$search%'";
        $result =  mysqli_query($connection, $query) or die ("Search Query Denied");
        echo "<table>";
		echo "<tr>";
		echo "	<th>Title</th>";
		echo "	<th>Description</th>";
		echo "	<th>City</th>";
		echo "	<th>State</th>";
		echo "	<th>Zip</th>";
		echo "	<th>Company</th>";
		echo "	<th>Date Posted</th>";
        while($row = mysqli_fetch_array($result)){
        	echo "<tr>";
		    echo "	<td>".$row['title']."</td>";
			echo "	<td>".$row['description']."</td>";
			echo "	<td>".$row['city']."</td>";
			echo "	<td>".$row['state']."</td>";
			echo "	<td>".$row['zip']."</td>";
			echo "	<td>".$row['company']."</td>";
			echo "	<td>".$row['date_posted']."</td>";
			echo "</tr>";
        }
        echo "</table>";
    }
    else{
    	$error = "You cannot leave the search box empty!";
		echo "<span>".$error."</span>";
    }  
endif;
?>
