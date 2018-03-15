<?php 
/**
 * Subject (Health Fitness Measurement)
 */
interface subject{
	public function registerObserver(Observer $observer);
	public function removeObserver(Observer $observer);
	public function notifyObserver();
}

class smartwatch implements subject{
   public $observers;
   protected $steps;
   protected $calories;
   protected $rest;

   public function __construct(){
   		$this->observers = array();
   }

   public function registerObserver(Observer $observer){
   		$this->observers[] = $observer;
   }

   public function removeObserver(Observer $observer){
   	    $key = array_search($observer, $this->observers);
   		unset($this->observers[$key]);
   		$this->observers = array_values($this->observers);
   }

   public function notifyObserver(){
   		for($i = 0; $i < count($this->observers); $i++){
	   			$this->observers[$i]->update($this->steps, $this->calories, $this->rest);
   		}
   }

   public function dataChange($steps, $calories, $rest){
   	    $this->steps = $steps;
   	    $this->calories = $calories;
   	    $this->rest = $rest;
   		$this->notifyObserver();
   }
}
//=========================================================================
//=========================================================================

/**
 * Observer (Devices)
 */
interface observer{
	public function update($steps, $calories, $rest);
}

interface device{
	public function display();
}

class tablet implements observer, device{
	protected $steps;
	protected $calories;
	protected $rest;

	public function update($steps, $calories, $rest){
		$this->steps = $steps;
		$this->calories = $calories;
		$this->rest = $rest;
		$this->display();
	}

	public function display(){
		echo "Pedometer: ".$this->steps."<br/>";
		echo "Eating: ".$this->calories."<br/>";
		echo "Sleep Hours: ".$this->rest."<br><br/>";

	}
}

class smartphone implements observer, device{
	protected $steps;
	protected $calories;
	protected $rest;

	public function update($steps, $calories, $rest){
		$this->steps = $steps;
		$this->calories = $calories;
		$this->rest = $rest;
		$this->display();
	}

	public function display(){
		echo "Pedometer: ".$this->steps."<br/>";
		echo "Eating: ".$this->calories."<br/>";
		echo "Sleep Hours: ".$this->rest."<br/><br/>";
	}
}

class desktop implements observer, device{
	protected $steps;
	protected $calories;
	protected $rest;

	public function update($steps, $calories, $rest){
		$this->steps = $steps;
		$this->calories = $calories;
		$this->rest = $rest;
		$this->display();
	}

	public function display(){
		echo "Pedometer: ".$this->steps."<br/>";
		echo "Eating: ".$this->calories."<br/>";
		echo "Sleep Hours: ".$this->rest."<br/><br/>";
	}
}

//=========================================================================
//=========================================================================
/**
 * Testing
 */
/*Observers */
$tablet = new tablet();
$desktop = new desktop();
$smartphone = new smartphone();

/*Subject*/
$smartwatch = new smartwatch();

/*Register the Observers*/
$smartwatch->registerObserver($tablet);
$smartwatch->registerObserver($desktop);
$smartwatch->registerObserver($smartphone);
$smartwatch->dataChange(34.56, 234.9, 234.34);

/*Remove the Observer */
$smartwatch->removeObserver($desktop);
echo "<pre>";
var_dump($smartwatch->observers);
echo "</pre>";
$smartwatch->dataChange(23.21, 123.9, 98.1);
?>
