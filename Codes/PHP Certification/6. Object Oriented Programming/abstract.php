<?php
abstract class car{
	protected $brand;
	protected $wheels;
	protected $doors;

	abstract protected function wheels($wheels);
	abstract protected function doors($doors);
	public function describe(){
       echo "$this->brand: It has $this->wheels wheels and $this->doors doors";
	}
}

class toyota extends car{
	public function __construct($brand){
		$this->brand = $brand;
	}
	public function wheels($wheels){
   		$this->wheels = $wheels;
	}

	public function doors($doors){
		$this->doors = $doors;
	}
}

$toyota = new toyota("Corolla");
$toyota->wheels(4);
$toyota->doors(4);
$toyota->describe();
?>