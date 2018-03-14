<?php 
try{
	$file = fopen("sample.csv", "w");
	$showroom = array();
	$showroom[] = ["Car", "Toytota", "Corolla"];
	$showroom[] = ["Car", "Nissan", "350z"];
    foreach($showroom as $car){
    	fputcsv($file, $car);
    }

}
catch(Exception $e){
	echo "Error: ".$e->getMessage();
}
finally{
fclose($file);
}
?>