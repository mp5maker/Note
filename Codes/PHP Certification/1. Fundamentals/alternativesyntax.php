<?php 
$bunch_of_numbers = [23, 42, 12, 100, 14, 29, 10];
$max_number = 0;

//Finding out the maximum value;
foreach($bunch_of_numbers as $number):
   		if($max_number < $number):
   			$max_number = $number;
   		endif;
endforeach;
echo nl2br("Highest Number is: $max_number\n");
echo nl2br("\n");

//While Loop
echo nl2br("While Loop\n");
$i = 0;
while($i < 4):
	echo nl2br("$i\n");
	$i++;
endwhile;
echo nl2br("\n");

//For Loop
$i = 0;
echo nl2br("For Loop\n");
for($i = 0; $i < 3;  $i++):
	echo nl2br("$i\n");
endfor;
echo nl2br("\n");

//Do While (No Alternative Syntax)
echo nl2br("Do While\n");
$i = 0;
do{
	echo nl2br("$i\n");
}while($i > 0);
echo nl2br("\n");



//Switch Case
echo nl2br("Switch Case\n");
$items = ["Apple", "Bat", "Cat", "Date", "Fall"];
foreach($items as $item):
	switch($item):
    case "Cat":
		echo nl2br("Moderate\n");
    break;
    case "Bat":
		echo nl2br("Good Work\n");
    break;
    case "Apple":
		echo nl2br("Excellent\n");
    break;
    case "Fall":
		echo nl2br("Dang it!\n");
    break;
    case "Date":
		echo nl2br("Phew!\n");
    break;
    endswitch;
endforeach;

?>
