<?php 
class db{}
class db2{}

class Registry{
	private static $register;

	public static function add(&$item){
		$name = get_class($item);
		self::$register[$name] = $item;
	}

	public static function &get($name){
		if(array_key_exists($name, self::$register)):
			return self::$register[$name];
		else:
			$msg = "$name is not registered";
			throw new Exception($msg);
		endif;
	}

	public static function exist($name){
		if(array_key_exists($name, self::$register)):
			return true;
		else: 
			return false;
		endif;
	}
}

$db =  new db();
$db2 = new db2();

Registry::add($db);
if(Registry::exist('db')):
	echo "<pre>";
	$db = Registry::get('db');
    $reflector  = new ReflectionClass($db);
    var_dump($reflector->getName());
    var_dump($reflector->getMethods());
	echo "</pre>";
endif
?>