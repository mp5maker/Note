<?php 
// interface ArrayAccess{
//     abstract public function offsetSet($offset);
//     abstract public function offsetGet($offset);
//     abstract public function offsetUnset($offset);
//     abstract public function offsetExists($offset);
// }
class first{};
class second{};

class myArray implements ArrayAccess{
	protected $container = array();
    
    public function __construct($offsets){
    	if(is_array($offsets)):
    		foreach($offsets as $offset):
    			$name = get_class($offset);
  				$this->offsetSet($offset, $name);
  			endforeach;
  		else:
  			$this->offsetSet($offsets);
    	endif;
    }

  	public function offsetSet($offset, $name){
        $this->container[$name] = $offset;
	}

	public function offsetGet($offset){
        	return $this->container[get_class($offset)];
	}

	public function offsetUnset($offset){
		    if(array_key_exists(get_class($offset), $this->container)):
				unset($this->container[get_class($offset)]);
			else:
				$msg = getclass($offset).", object do not exist!";
				throw new Exception($msg);
		    endif;
	}

	public function offsetExists($offset){
		return array_key_exists(get_class($offset), $this->container);
	}
}

$first = new first();
$second = new second();
$array = new myArray([$first,$second]);

echo "<pre>";

echo "<strong>Array of Objects</strong><br/><br/>";
var_dump($array);

echo "<strong>Get the the Specific Object</strong><br/><br/>";
var_dump($array->offsetGet($first));

echo "<strong>Delete one of the Object</strong><br/><br/>";
$array->offsetUnset($second);
// $array->offsetUnset($third);
var_dump($array);

echo "<strong>Check whether the Object exists or not</strong><br/><br/>";
var_dump($array->offsetExists($first));
var_dump($array->offsetExists($second));
echo "</pre>";
?>