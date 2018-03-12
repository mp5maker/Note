<?php 
class Registry{
	private static $_register;

	public function add(&$item, $name = null){
		if(is_object($item) && is_null($name)):
			$name = get_class($item);
		elseif (is_null($name)):
			$msg = "You must provide a name for non-objects";
		    throw new Exception($msg);
		endif;
		$name = strtolower($name);
		$_register[$name] = $item;
	}

	public static function &get($name){
		$name = strtolower($name);
	}

}

?>