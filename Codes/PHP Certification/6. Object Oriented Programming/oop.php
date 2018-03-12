<?php 
/**
 * Object Oriented Programming
 */

class human{
	protected $name;
	const BAR = "Hello World";
	public function __construct($name){
		$this->name = $name;
	}

	public function move(){
		return $this->name.", I move and move!";
	} 

	public function text(){
		return human::BAR;
	}
}

$peter = new human("Peter Parker");
echo $peter->move()."<br/>";
echo $peter->text();
?>