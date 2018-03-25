<?php 
$server_name = "localhost";
$username = "root";
$pass = "";
$db = "riskyjobs";

$connection = mysqli_connect($server_name, $username, $pass, $db)
			  or die ("Server Denied");

$query = "SELECT * FROM riskyjobs";
$data = mysqli_query($connection, $query)
       or die("Query Denied");

$array_data = array();
while($row = mysqli_fetch_array($data)){
	$id = $row['job_id'];
	$title = $row['title'];
	$city = $row['city'];
	$state = $row['state'];
	$zip = $row['zip'];
	$company = $row['company'];
	$date_posted = $row['date_posted'];
	$array_data[] = ["id" => "$id",
					 "title" => "$title",
					 "city" => "$city",
					 "state" => "$state",
					 "zip" => "$zip",
					 "company" => "$company",
					 "date_posted" => "$date_posted"
			];
}

echo "update(".json_encode($array_data).")";
?>

