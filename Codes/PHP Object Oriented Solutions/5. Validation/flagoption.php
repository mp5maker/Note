<?php 
/**
 * Filter with Flags
 * @var float
 */
$var = 100.98;
$filtered = filter_var($var, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
echo  "<pre>";
var_dump($filtered);
echo "</pre>";

/**
 * Filter with multiple Flags using pipeline
 */
$var = "100,000.98";
$filtered = filter_var($var, FILTER_SANITIZE_NUMBER_FLOAT,
                       FILTER_FLAG_ALLOW_FRACTION|FILTER_FLAG_ALLOW_THOUSAND);
echo  "<pre>";
var_dump($filtered);
echo "</pre>";


/**
 * Filter with options only
 */
$var = 2;
$filtered = filter_var($var, FILTER_VALIDATE_INT, ["options" =>
	                                                  ["min_range" => 5, "max_range" => 10]
	                                              ]);
echo  "<pre>";
var_dump($filtered);
echo "</pre>";

$var = "10,5";
$filtered = filter_var($var, FILTER_VALIDATE_FLOAT, ["options" => ["decimal" => ","]]);
echo  "<pre>";
var_dump($filtered);
echo "</pre>";

/**
 * Filter with options and flags
 */
$var = "100.789,5";
$filtered = filter_var($var, FILTER_VALIDATE_FLOAT, [
													  "options" => ["decimal" => ","],
													  "flags"	=>  FILTER_FLAG_ALLOW_THOUSAND
													]);
echo  "<pre>";
var_dump($filtered);
echo "</pre>";

/**
 * Filtering multiple variable
 */
$data = [
		 'age' => 21,
		 'rating' => 4,
		 'price' => 9.95,
		 'thousands' => 100,000.95,
		 'european' => 100.000,95
];

$instructions = [
				  "age" => FILTER_VALIDATE_INT,
				  "rating" => [
				  			    "filter"  => FILTER_VALIDATE_INT,
				  			    "options" => [
				  			    			   "min_range" => 1,
				  			    			   "max_range" => 5
				  			    			 ] 
				  			  ],
				 "price" => [
				 			   "filter" => FILTER_SANITIZE_NUMBER_FLOAT,
				 			   "flags"  => FILTER_FLAG_ALLOW_THOUSAND
				 
				 			],
				 "thousands" => [
				 				  "filter" => FILTER_SANITIZE_NUMBER_FLOAT,
				 				  "flags" => FILTER_FLAG_ALLOW_FRACTION | 
				 				             FILTER_FLAG_ALLOW_THOUSAND
				 				],
				 "european" => [
				 				 "filter" => FILTER_VALIDATE_FLOAT,
				 				 "options"  => ["decimal" => ","],
				 				 "flags"	=> FILTER_FLAG_ALLOW_THOUSAND 	
				 			   ]			  			  
];

$filtered = filter_var_array($data, $instructions);
echo "<pre>";
var_dump($filtered);
echo "</pre>";
?>
