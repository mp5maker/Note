<?php 
$name = "full_name";
$$name = "Photon Khan";
echo $full_name."<br/>";

$number = '123';
$$number = '456';
echo ${'123'}."<br/>";

function display($text){
  echo $text."<br/>";
}
$function_name = 'display';
$function_name("I am a disco dancer");
?>