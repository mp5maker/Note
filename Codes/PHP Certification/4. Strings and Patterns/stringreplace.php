<?php 
//String Replace
echo "<strong> String Replace </strong></br>";
echo  str_replace('Vroom', 'Boom','Vroom Shakalaka Vroom Shakalaka Vroom',$a).", $a characters got replaced"."<br/>";
echo  str_ireplace('vroom', 'Boom','Vroom Shakalaka Vroom Shakalaka Vroom',$b).", $b characters got replaced"."<br/>";

//Passing Array
echo  str_replace(['Vroom', 'Shakalaka'], ['Boom', 'Shakalaka'],'Vroom Shakalaka Vroom Shakalaka Vroom')."<br/>";
echo  str_ireplace(['vroom', 'shakalaka'], ['Boom', 'Shakalaka'],'Vroom Shakalaka Vroom Shakalaka Vroom')."<br/>";
echo  str_ireplace(['vroom', 'shakalaka'], 'Boom','Vroom Shakalaka Vroom Shakalaka Vroom')."<br/>";
echo "</br>";

echo "<strong> Substring Replace </strong></br>";
echo substr_replace('Hello World', "Reader", 6);
echo substr_replace('I am a disco dancer', "bouncer", 13, 6);
echo "</br>";
echo "</br>";

//Combining strpos +  substr_replace
echo "<strong> Combining strpos + substr_replace </strong></br>";
$user =  "khan.photon@gmail.com";
$name = substr_replace($user, " ", strpos($user, "@"));
echo $name;
echo "</br>";

//Extracting Substring
$name = "James Rozario";
echo substr($name, 0, 5);
?>

