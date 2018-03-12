<?php
/**
 * Singleton Pattern
 */
class database{
	private static $_db_con;
	private $_connection;
  private $server_name = "localhost";
	private $user_name = "root";
	private $password = "";
	private $db_name = "riskyjobs";
	
	private function  __construct(){
       $this->_connection = mysqli_connect($this->server_name, $this->user_name, $this->password, $this->db_name)
                            or die("Server Connection Denied");
    }

    public function connect(){
       if(is_null(self::$_db_con)):
       	  self::$_db_con = new database();
       endif;
       return self::$_db_con;
	}
}

$database = database::connect();
$reflect = new ReflectionClass($database);
echo "<pre>";
var_dump($reflect->getName());
var_dump($reflect->getMethods());
echo "</pre>";
?>