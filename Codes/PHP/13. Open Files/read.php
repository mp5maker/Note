<?php 
//echo readfile("web.txt");

try{
	$file = fopen("web.txt", "r");
     /**
      * This reads out all text in one line
      */
	// echo fread($file, filesize("web.txt"));

    /**
     * Searchs for the end of line and follows the format
     */
    while(!feof($file)){
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