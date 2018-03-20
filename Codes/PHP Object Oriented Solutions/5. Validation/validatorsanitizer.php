<?php 
class ValidatorSanitizer{
	protected $inputType;
	protected $submitted;
	protected $required;
	protected $filterArgs;
	protected $filtered;
	public $missing;
	protected $errors;

	public function __construct($required = array(), $inputType = 'post'){
		if(!is_null($required) && !is_array($required)):
			throw new Exception("Required field must be an array");
		endif;
		$this->required = $required;
		$this->setInputType($inputType);
		if($this->required){
			$this->checkRequired();			
		}
		$this->filterArgs = array();
		$this->errors = array();
	}

	protected function setInputType($type){
		switch(strtolower($type)):
		case 'get':
		$this->inputType = INPUT_GET;
		$this->submitted = $_GET;
		break;

		case 'post':
		$this->inputType = INPUT_POST;
		$this->submitted = $_POST;
		break;
		
		default: throw new Exception("Input valid types are get and post");
		endswitch;
	}

	protected function checkRequired(){
		$OK = array();
		foreach($this->submitted as $name => $value):
			$value = is_array($value)? $value : trim($value);
			if(!empty($value)):
				$OK[] = $name;
			endif;
		endforeach;
		$this->missing = array_diff($this->required, $OK);
	}

	protected function checkDuplicateFilter($fieldName){
		if(isset($this->filterArgs[$fieldName])){
			throw new Exception("A filter has been already set for this field: {$fieldName}");
		}
	}

	public function isInt($fieldName, $min = null, $max = null){
		$this->checkDuplicateFilter($fieldName);
		$this->filterArgs[$fieldName] = ["filter" => FILTER_VALIDATE_INT];
		if(is_int($min)):
			$this->filterArgs[$fieldName]['options']['min_range'] = $min;
		endif;
		if(is_int($max)):
			$this->filterArgs[$fieldName]['options']['max_range'] = $max;
		endif;
	}

	public function isFloat($fieldName, $decimalPoint = ".", $allowThousandSeparator = true){
		$this->checkDuplicateFilter($fieldName);
		if($decimalPoint != "." && $decimalPoint != ","):
			throw new Exception("Decimal Point must be a comma or period");
		endif;
		$this->filterArgs[$fieldName] = [
										 'filter' => FILTER_VALIDATE_FLOAT,
										 'options' => ["decimal" => $decimalPoint] 
										];
		if($allowThousandSeparator):
			$this->filterArgs[$fieldName]['flags'] = FILTER_FLAG_ALLOW_THOUSAND;
		endif;										
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Testing</title>
		<meta charset = "UTF-8">
	</head>
	<body>
		<form method = "post" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
			<label for = "fullname"> Name </label><br/>
			<input type = "text" name = "fullname"><br/><br/>
			
			<label for = "email"> Email </label><br/>
			<input type = "text" name = "email"><br/><br/>

			<label for = "description"> Description </label><br/>
			<textarea name = "description"></textarea><br/><br/>

			<input type = "submit" value = "Submit" name = "submit"/>
		</form>
	</body>
</html>

<?php 
if(filter_has_var(INPUT_POST, "submit")){
	$data = ["fullname", "email", "description"];
	$filtered = new ValidatorSanitizer($data);
	print_r($filtered->missing);
}
?>