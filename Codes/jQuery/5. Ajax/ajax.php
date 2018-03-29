<?php 
$employees = ["sam" => "engineer", "bob" => "housekeeper"];
if(isset($_REQUEST['postit'])):
	echo json_encode($employees);
elseif(isset($_REQUEST['getit'])):
	echo json_encode($employees);
else:
endif;
?>