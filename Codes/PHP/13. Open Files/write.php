<?php 
try{
	 $file = fopen("new.txt", "w");
	 $txt = "Damn sone \n";
	 fwrite($file, $txt);
	 $txt = "You crazy, Bro!\n";
	 fwrite($file, $txt);
}
catch(exception $e){
	echo "Error: ".$e->getMessage();
}
finally{
	fclose($file);
}
?>