<?php 
$data = ["desktop" => "Multi-tasking",
"harddrive" => "Saving Files",
"trash" => "Deleting Files",
"folder" => "Organizing Files"
];

if(isset($_REQUEST)){
	echo $data[$_REQUEST["ImageID"]];
}
?>

