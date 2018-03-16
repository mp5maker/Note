<?php
class database{
	private static $database;
	private static $attempt = 0;
	private function __construct(){}

	public static function connect(){
		if(is_null(self::$database)):
			self::$database = new database();
			echo "Database Connected<br/>";
		else:
			self::$attempt += 1;
			echo "Database Already Connected, Attempt Failure: ".self::$attempt."<br/>";
		endif;
		return self::$database;
	}
}

/**
 * Testing
 */
$database = database::connect();
$database2 = database::connect();
$database3 = database::connect();
$database4 = database::connect();
$database5 = database::connect();
?>