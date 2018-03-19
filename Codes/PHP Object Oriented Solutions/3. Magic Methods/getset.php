<?php 
class getset{
	protected $array;

	public function __get($name){
		if(array_key_exists($name, $this->array)):
			return $name;
		else:
			throw new Exception("This value already exist");
		endif;
	}

	public function __set($name, $value){
		$this->array[$name] = $value;
	}
}

$access = new getset();
$access->superman = "superman";
$access->batman = "batman";
echo $access->superman."<br/>";
echo $access->batman."<br/>";
?>