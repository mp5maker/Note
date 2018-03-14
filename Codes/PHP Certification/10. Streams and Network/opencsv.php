<?php
try{
	$file = fopen("networking.csv", "r");
    while($row = fgetcsv($file)){
    	echo fgets($file)."<br/>";
    }
}
catch(Except $e){
  echo "Message: ".$e->getMessage();
}
finally{
	fclose($file);
}
?>
