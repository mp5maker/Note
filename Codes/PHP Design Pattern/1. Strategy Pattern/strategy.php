<?php 
/**
 * Interface Superpower
 */
interface superpower{
	public function power();
}

/**
 * Web one of the superpower
 */
class web implements superpower{
	public function power(){
		return "I can throw webs!";
	}
}

/**
 * Laser one of the superpower
 */
class laser implements superpower{
	public function power(){
		return "I can shoot ray!";
	}
}

/**
 * No Superpower
 */
class nosuperpower implements superpower{
	public function power(){
		return "I have no superpower!";
	}
}
/*
*************************************
*************************************
 */

/**
 * Interface Gadgets
 */
interface gadgets{
	public function gadgetuse(); 
}

/**
 * Batarang one of the gadgets
 */
class batarang implements gadgets{
	public function gadgetuse(){
		return "I can throw my batarang!";
	}
}

/**
 * No Gadgets
 */
class nogadgets implements gadgets{
	public function gadgetuse(){
		return "I do not use any gadget!";
	}
} 
/*
*************************************
*************************************
 */


/**
 *  Abstract Superhero
 */
abstract class superhero{
  protected $superpowers;
  protected $gadgets;

  abstract public function name();
  
  public function power(){
  	return $this->superpowers->power();
  }

  public function gadgetuse(){
 	return $this->gadgets->gadgetuse();
  }
  
  public function display(){
	echo nl2br("<strong>".$this->name()."</strong>\n") ;
	echo nl2br("Superpower: ".$this->power()."\n");
	echo nl2br("Gadget: ".$this->gadgetuse()."\n");
	echo nl2br("--------------------------------------------------\n");
  } 
}

/**
 * Spiderman one of the superheroes
 */
class Spiderman extends superhero{
	public function __construct(){
		$this->superpowers = new web();
		$this->gadgets =  new nogadgets();
	}

	public function name(){
		return get_class($this);
	}
}

/**
 * Superman one of the superheroes
 */
class Superman extends superhero{
	public function __construct(){
		$this->superpowers = new laser();
		$this->gadgets =  new nogadgets();
	}

	public function name(){
		return get_class($this);
	}
}

/**
 * Batman one of the superheroes
 */
class Batman extends superhero{
	public function __construct(){
		$this->superpowers = new nosuperpower();
		$this->gadgets =  new batarang();
	}

	public function name(){
		return get_class($this);
	}
}

/*
*************************************
*************************************
 */


/**
 * Testing
 */
$spiderman = new Spiderman();
$spiderman->display();

$superman = new Superman();
$superman->display();

$batman = new Batman();
$batman->display();
?>