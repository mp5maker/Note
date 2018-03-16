<?php 
/**
 * Shape Interface
 */
interface Shape{
	public function draw();
}

class Rectangle implements Shape{
  	public function draw(){
  		return "Rectangle";
  	}
}

class Ellipse implements Shape{
	public function draw(){
  		return "Ellipse";

	}
}

/**
 * Color Interface
 */
interface Color{
	public function fill();
}

class Red implements Color{
	public function fill(){
  		return "Red";
	}

}

class Blue implements Color{
	public function fill(){
  		return "Blue";
	}
}


/**
 * Abstract Factory Interface
 */
Interface AbstractFactory{
	public function getShape($shape);
	public function getColor($color);
}

class ShapeFactory implements AbstractFactory{
	public function getShape($shape){
		$shape = strtolower($shape);
		switch($shape):
		case "rectangle":
		$rectangle = new Rectangle();
		return $rectangle->draw();
		break;
		case "ellipse":
		$ellipse = new Ellipse();
		return $ellipse->draw();
		break;
		default: throw new Exception("Shape not recognized");
		endswitch;
	}

	public function getColor($color){
		return null;
	}
}

class ColorFactory implements AbstractFactory{
	public function getShape($shape){
		return null;
	}

	public function getColor($color){
		$color = strtolower($color);
		switch($color):
		case "red":
		$red = new Red();
		return $red->fill();
		break;
		case "blue":
		$blue = new Blue();
		return $blue->fill();
		break;
		default: throw new Exception("Color not recognized");
		endswitch;
	}
}

/**
 * Factory Producer
 */
class FactoryProducer{
	public function __construct($shape, $color){
		$colorFactory = new ColorFactory();
		$shapeFactory = new ShapeFactory();
		echo $colorFactory->getColor($color)." "
		     .$shapeFactory->getShape($shape)."<br/>";
	}
}

/**
 * Testing
 */

echo nl2br("Color + Shape = Filled Colors\n\n");
$coloredshape = new FactoryProducer("rectangle","red");
$coloredshape = new FactoryProducer("Rectangle","blue");
$coloredshape = new FactoryProducer("ellipse","blue");
$coloredshape = new FactoryProducer("Ellipse","red");
?>