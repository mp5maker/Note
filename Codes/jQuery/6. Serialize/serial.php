<?php
 if(isset($_POST)): 
   $fullname = $_POST['fullname'];
   $age = $_POST['age'];
   $fullname = "FullName: ".$fullname;
   $age = "Age: ".$age;
   try{
   		$file = fopen("serial.txt", "w");
   		$string = $fullname.", ".$age;
   		fwrite($file, $string);
   		var_dump($_POST);

   }catch(Exception $e){
   		echo ("Error: ".$e->getMessage());
   }finally{
   	fclose($file);
   }
endif;
?>