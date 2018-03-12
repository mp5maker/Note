<?php
/**
 * Works on Linux
 */
// echo setlocale(LC_ALL, "ja_JP");
// echo money_format("%i", "1000000.698");

/**
 * printf
 */
printf("Returns a string with a return value of 1");
echo "<br/>";

/**
 * sprintf
 */
$number = 1;
$word = "formatted";
$txt = sprintf("Writes %s string to %i or more variables", $word, $number);
echo $txt;
echo "<br/>";

/**
 * fprintf
 */
$number = 1;
$word = "formatted";
try{
      $file = fopen("sample.txt", "w");
      fprintf($file, "Writes %s string to %u or more variables", $word, $number);
}
catch(except $e){
	"Error: ".$e->getMessage();
}
finally{
	fclose($file);
echo "<br/>";

/**
 * sscanf
 */
$data = "123 456 789";
$format = "%d %d %d";
echo "<pre>";
var_dump(sscanf($data, $format));
echo "</pre>";
}
?>