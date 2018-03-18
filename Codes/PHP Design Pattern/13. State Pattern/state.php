<?php 
class Signal{
	protected $green;
	protected $red;
	protected $state = NULL;


	public function __construct(){
		$this->green = new Green();
		$this->red = new Red();
	}

	public function setState(State $state){
		$this->state = $state;
	}

	public function nextState(){
		return get_class($this->state);
	}

	public function getGreen(){
		return $this->green;
	}

	public function getRed(){
		return $this->red;
	}

}

interface State{
	public function on(Signal $signal);
}

class Green implements State{
	public function on(Signal $signal){
		echo "Cars, move please!";
		$signal->setState($signal->getRed());
	}	
}

class Red implements State{
	public function on(Signal $signal){
		echo "Cars, Stop!";
		$signal->setState($signal->getGreen());
	}
}

$signal = new Signal();
$green = new Green();
$red = new Red();
$green->on($signal);
echo $signal->nextState();
$red->on($signal);
echo $signal->nextState();
?>