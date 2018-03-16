<?php 
/**
 * Object
 */
class Light{
	public function on(){
		return "Light on<br/>";
	}

	public function off(){
		return "Light off <br/>";
	}
}

class GarageDoor{
	public function open(){
		return "Door Open<br/>";
	}

	public function close(){
		return "Door Close<br/>";
	}
}


/**
 * Command Interface
 */
interface Command{
	public function execute();
}

class LightOnCommand implements Command{
	protected $light;
	public function __construct($light){
		$this->light = $light;
	}

	public function execute(){
		return $this->light->on();
	}
}

class LightOffCommand implements Command{
	protected $light;
	public function __construct($light){
		$this->light = $light;
	}

	public function execute(){
		return $this->light->off();
	}
}

class DoorOpenCommand implements Command{
	protected $garage;
	public function __construct($garage){
		$this->garage = $garage;
	}

	public function execute(){
		return $this->garage->open();
	}
}

class DoorCloseCommand implements Command{
	protected $garage;
	public function __construct($garage){
		$this->garage = $garage;
	}

	public function execute(){
		return $this->garage->close();
	}
}


/**
 * Remote Control
 */
class RemoteControl{
	protected $commands;

	public function setCommand(){
		$num = func_num_args();
		$data = func_get_args();
		for($i = 0; $i < $num; $i++): 
			$this->commands[] = $data[$i];
		endfor;
	}

	public function buttonPushed(){
		foreach($this->commands as $command):
			echo $command->execute();
		endforeach;
	}
}

/**
 * Turning on the light
 */
$light = new Light();
$lighton = new LightOnCommand($light);

/**
 * Opening Garage Door
 */
$garage = new GarageDoor();
$garageopen = new DoorOpenCommand($garage);

/**
 * Macro Command
 */
$remote = new RemoteControl();
$remote->setCommand($lighton, $garageopen);
$remote->buttonPushed();

/*****************************************/
/*****************************************/

/**
 * Closing Garage Door
 */
$garageoff = new DoorCloseCommand($garage);

/**
 * Turning off the light
 */
$lightoff = new LightOffCommand($light);

/**
 * Macro Command
 */
$remote = new RemoteControl();
$remote->setCommand($lightoff, $garageoff);
$remote->buttonPushed();
?>
