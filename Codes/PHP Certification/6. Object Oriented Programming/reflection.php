<?php 
/**
 * Creating class called Hello
 * which return text
 */
class hello{
	/**
	 * $text takes the data from the user input
	 * @var string
	 */
	protected $text;

     /**
      * __construct  takes the string from the user
      * @param string $text
      */
	public function __construct($text){
       $this->text = $text;
	} 

     /**
      * getText return the text
      * @return string 
      */
	public function getText(){
		return $text;
	}
}

$reflector = new ReflectionClass('hello');
echo "<pre>";
var_dump($reflector->getDocComment());
var_dump($reflector->getName());
var_dump($reflector->getMethods());
var_dump($reflector->getStartLine());
var_dump($reflector->getEndLine());
echo "</pre>";
?>