<?php 
// $companies = [
//               ["Acme Anvil Co."],
// 		   		 [
// 		   		 	[
// 		   		 		"Human Resources", [
// 		   		 							 "Tom", "Dick", "Harry"
// 		   		 						   ]
// 		   		 	],
// 		   		 	[
// 		   		 		"Accounting", [
// 		   		 			             "Zoe", "Duncan", "Jack", "Jane"
// 		   		 					  ]
// 		   		 	]
// 		   		 ]

// 		   ];

$companies = array(
	array("Acme Anvil Co."),
	array(
		array(
		"Human Resources",array(
			"Tom","Dick","Harry")),
		array(
			"Accounting", array(
			"Zoe", "Duncan", "Jack", "Jane")
		)
	)
);

$arrayiter = new RecursiveArrayIterator($companies);
$iteriter = new RecursiveIteratorIterator($arrayiter);

foreach ($iteriter as $key => $value){
  $depth = $iteriter->getDepth();
  switch($depth):
  case 1:
  echo "<h1>$value</h1>";
  break;

  case 2:
  echo "<h2>$value</h2>";
  break;

  case 3:
  echo "<li>$value</li>";
  break;
  default:
  endswitch;
}
?>