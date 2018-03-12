<?php
class Configuration{
	const STORE_INI = 1;
	const STORE_DB = 2;
	const STORE_XML = 3;

	public static function getStore($type = self::STORE_XML){
		switch($type):
		case self::STORE_INI:
			return new Configuration_INI();
		break;
		case self::STORE_DB:
			return new Configuration_DB();
		break;
		case self::STORE_XML:
			return new Configuration_XML();
		break;
		default:
		throw new Exception("Unkown Datastore Specified");
		endswitch;
	}
}

class Configuration_INI{
	public function __construct(){
		echo "Storing in Configuration_INI";
	}
}

class Configuration_DB{
	public function __construct(){
		echo "Storing in Configuration_DB";
	}
}

class Configuration_XML{
	public function __construct(){
		echo "Storing in Configuration_XML";
	}
}

$configuration = Configuration::getStore(Configuration::STORE_DB);
$reflect = new ReflectionClass($configuration);
echo "<pre>";
var_dump($reflect->getName());
var_dump($reflect->getMethods());
echo "</pre>";
?>