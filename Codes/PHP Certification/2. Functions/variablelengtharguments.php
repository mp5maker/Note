<?php 
function getdata(){
  if(func_num_args() == 0):
  	 echo "You need to specify at least one argument";
  else:
  	  $args = func_get_args();
	  switch(func_num_args()):
	  case 1:
	  return "One Item: ".$args[0];
	  break;
	  
	  case 2:
	  return "Two items: ".array_shift($args).", ".array_shift($args);
	  break;

	  default:
	  endswitch;
  endif;
}

$one_item = getData("potato");
$two_items = getData("potato", "tomato");
echo nl2br("$one_item\n");
echo nl2br("$two_items\n");
?>