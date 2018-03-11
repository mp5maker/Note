<?php 
/**
 * [customError]
 * @param  int    $errno   error number   
 * @param  string $errstr  error string        
 * @return NULL   
 */

//Show Error (Notice: 8)
function customError($errno, $errstr, $errfile, $errline){
  // ob_start();
  echo "Error: [$errno] $errstr, on  line $errline";
  // $str = ob_get_contents();
  // error_log($str);
  // ob_end_clean();
  // var_dump($str);
  error_log("Error: [$errno] $errstr, on  line $errline",1,
  "khan.photon@gmail.com","From: khan.photon@gmail.com");
}

set_error_handler("customError");
echo($test);
echo "<br/>";


//Trigger Error (User Notice: 1024)
$i = 2;
if($i > 1){
	trigger_error("Value should be 1");
}
?>
