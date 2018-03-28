<?php 
$array = ["Sam" => "Gotta Go Fast", "Bob" => "Beaming through the light",  "William" => "Do not need to"];
if(isset($_REQUEST['call'])){
	echo json_encode($array);
}
?>