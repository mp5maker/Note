<?php 
interface shape{
	public function draw();
}

class rectangle implements shape{
	public function draw(){
		echo "Rectangle"."<br/>";
	}
}

class ellipse implements shape{
	public function draw(){
		echo "Ellipse"."<br/>";
	}
}

class shapeMaker{
	protected $rectangle;
	protected $ellipse;

	public function __construct(){
		$this->rectangle = new rectangle();
		$this->ellipse = new ellipse(); 
	}

	public function drawRectangle(){
		return $this->rectangle->draw();
	}

	public function drawEllipse(){
		return $this->ellipse->draw();
	}
}

$shapeMaker = new shapeMaker();
$shapeMaker->drawRectangle();
$shapeMaker->drawEllipse();
?>