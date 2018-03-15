<?php 
abstract class Item{
	protected $description = "";
	protected $extras = array();
	public function getDescription(){
		return $this->description;
	}
	abstract function cost();
}

class ChickenBurger extends Item{
	public function __construct($extras = NULL){
		$this->extras = $extras;
		$this->description = "Chicken Burger";
	}

	public function getDescription(){
		$items = array();
		if($this->extras == NULL):
			return $this->description;
		else:
			$this->description.= " with ";
			if(is_array($this->extras)):
				foreach($this->extras as $extra):
					$items[] = $extra->getDescription();
				endforeach;
				$totalitems = implode(", ", $items);
				return $this->description." {$totalitems}";
			else:
				return $this->description." {$this->extras->getDescription()}";
			endif;
		endif;
	}

	public function cost(){
		$cost = 0;
		if($this->extras == NULL):
			return 250;
		else:
			if(is_array($this->extras)):
				foreach($this->extras as $extra):
					$cost = $extra->cost() + $cost;
				endforeach;
				return 250 + $cost;
			else:
				return 250 + $this->extras->cost();
			endif;
		endif;
	}
}

class frenchfries extends Item{
	public function __construct(){
		$this->description = "French Fries"; 
	}
 
    public function cost(){
    	return 100;
    }
}

class cheese extends Item{
public function __construct(){
		$this->description = "Cheese"; 
	}
 
    public function cost(){
    	return 50;
    }
}

class drink extends Item{
    public function __construct(){
		$this->description = "Drink"; 
	}
 
    public function cost(){
    	return 25;
    }
}

$frenchfries = new frenchfries();
$cheese = new cheese();
$drink = new drink();
$extras = [$frenchfries, $cheese, $drink];
$chickenburger = new chickenburger([$frenchfries, $drink]);


echo $chickenburger->getDescription()."<br/>";
echo "Cost: ".$chickenburger->cost()."<br/>";
?>