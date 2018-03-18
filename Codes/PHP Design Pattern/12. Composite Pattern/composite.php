<?php 
interface Graphic{
	public function print();
}

class CompositeGraphic implements Graphic{
	protected $graphics;

	public function print(){
		echo "<pre>";
			var_dump($this->graphics);
		echo "</pre>";
		foreach ($this->graphics as $graphic):
			echo get_class($graphic)."<br/"; 
			echo $graphic->print()."<br/>";
		endforeach;
	}

	public function add(Graphic $graphic){
		$this->graphics[] = $graphic;
	}

	public function remove(Graphic $graphic){
		if(in_array($graphic, $this->graphics)):
			$key = array_search($graphic, $this->graphics);
			unset($this->graphics[$key]);
			$this->graphics = array_values($this->graphics);
		endif;
	}
}

class Ellipse implements Graphic{
	public function print(){
		echo ("Ellipse");
	}
}

$ellipse1 = new Ellipse();
$ellipse2 = new Ellipse();
$ellipse3 = new Ellipse();
$ellipse4 = new Ellipse();

$graphic  = new CompositeGraphic();
$graphic1 = new CompositeGraphic();
$graphic2 = new CompositeGraphic();

$graphic1->add($ellipse1);
$graphic1->add($ellipse2);
$graphic1->add($ellipse3);

$graphic2->add($ellipse4);

$graphic->add($graphic1);
$graphic->add($graphic2);

$graphic->print();
?>